import mysql.connector
import datetime

print("Content-Type: text/html\n")
from random import sample
import pandas as pd
print(pd.__version__)
from pytrends.request import TrendReq

dt = datetime.datetime.today()
print(dt)

pytrends = TrendReq(hl='en-US', tz=360)

IND = pytrends.trending_searches(pn='india')
news = IND.values


cnx = None
try:
    cnx = mysql.connector.connect(
        user='',  # ユーザー名
        password='',  # パスワード
        host='',  # ホスト名(IPアドレス）
        database=''  # データベース名
    )
    zero = 0
    cursor = cnx.cursor()
    
    
    for num in range(10):
        
    
        #新たなタイトルを入れる
        sql = ('''
               
        INSERT INTO news_ind(title_id, title_name, title_day, count) 
        SELECT %s,%s,%s,%s
        WHERE NOT EXISTS (SELECT * FROM news_ind WHERE title_name = %s);      
        
        ''')
        
        data = [
        ('',str(*news[num]),dt,zero,str(*news[num])),
        ]
        cursor.executemany(sql, data)
         
        #同じタイトルがある場合時間を変える。更新時にcount+1
        sql = ('''
        UPDATE  news_ind
        SET     title_day = %s,count = count + 1
        WHERE   title_name = %s
        ''')
        param = [
        (dt,str(*news[num])),
        ]
        cursor.executemany(sql, param)
        
        #ランキング更新
        sql = ('''
        UPDATE  rank_ind
        SET     rank_title = %s
        WHERE   rank_id = %s;
        
        ''')
        
        data1 = [
        
        (str(*news[num]),num+1),
    ]
        cursor.executemany(sql, data1)
        
        
        cnx.commit()

    cursor.close()

except Exception as e:
    print(f"Error Occurred: {e}")

finally:
    if cnx is not None and cnx.is_connected():
        cnx.close()
