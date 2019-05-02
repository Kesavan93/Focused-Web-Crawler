#!C:\Users\Kesavan\Desktop\WPy64-3720\python-3.7.2.amd64\python.exe
print("Content-Type: text/html\n")
print ("")
print("<html>")

print("<body>")
print("<button type='button' class='button'  ><a href='redirect.py' style='text-decoration:none; color:white;' ><strong>Crawl Again<strong></a></button>")
print("<button type='button' class='button'  ><a href='store.csv' style='text-decoration:none; color:white;' ><strong>DOWNLOAD<strong></a></button>")

print("<link rel='stylesheet' href='css/crawl.css'>")   
print("<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>")
print("<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>")  
print("<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>")  

import cgi
import tweepy
import csv
#import os
#import matplotlib.pyplot as plt
from textblob import TextBlob
import mysql.connector
#from wordcloud import WordCloud



mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="kesadb"
)

mycursor = mydb.cursor()

#from tweepy import OAuthHandler
 
consumer_key="5YeejO2mjW5OCi8PGU90Ug1Yv"
consumer_secret="IeIV03egRWq87esqBxAVec36zpUOb3N1XbEeVithMm22tje7D3"
access_token="988613367928569856-QbzlZUzylGrUO6BMaJBZL0W7l4IyBzF"
access_token_secret="3CefknQYUEe1O0bZHKK6wKwMZYQoLkctTpA1E3mkgWOAo"

 
auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)
api = tweepy.API(auth)


form = cgi.FieldStorage()
term =  form.getvalue('keyword')
startdate = form.getvalue("start")
enddate = form.getvalue("end")
mozhi = form.getvalue("language")
lokasi = form.getvalue("location")
rad = form.getvalue("radius")
howmany = form.getvalue("qty")
int_howmany = int(howmany)

searchterm = "{} -filter:retweets"

merger=""
radstep1=(rad,"km")
radstep2 = merger.join(radstep1)

separator=","
coordi=(lokasi,radstep2)
geo_code = separator.join(coordi)



csvFile = open('store.csv', 'a', newline='', encoding='utf-8')
csvWriter = csv.writer(csvFile)


print("<div class='container'>")
print("<table id='twee' class='table table-bordered'>")  
print("<thead>")    
print("<tr>")
print("<th>List N0 </th>")
print("<th>Created Date </th>")
print("<th>Keyword </th>")
print("<th>Tweets </th>")
print("<th>Sentiment </th>")
print("</tr>")
print("</thead>")
print("<tbody>")

iter=1

 
for tweet in tweepy.Cursor(api.search, q=searchterm,
                           since = startdate,
                           until = enddate,
                           lang = mozhi,
                           geocode = geo_code,
                           tweet_mode = "extended").items(int_howmany):

        tweets = tweet

        def analyze_sentiment(tweet):
            analysis = TextBlob(tweet)
            if analysis.sentiment.polarity > 0.05:
                return 'Positive'
            elif analysis.sentiment.polarity > -0.05 and analysis.sentiment.polarity < 0.05:
                return 'Neutral'
            else:
                return 'Negative'
            
        score = analyze_sentiment(tweet.full_text)
        if (score == "Positive"):
            print("<tr style='background-color:green; color:white;'>")
        elif (score == "Negative"):
            print("<tr style='background-color:red; color:white;'>")
        else:
            print("<tr>")    

#        print("<tr style='background-color:green;'>")    
#    if(tweet.truncated == false)
# example:        csvWriter.writerow([tweet.created_at, tweet.text.encode('utf-8')])
        csvWriter.writerow([tweet.full_text.encode('utf-8')])
        print("<td>", iter, "</td>")
        print("<td>", tweet.created_at, "</td>")
        print("<td>", term, "</td>")
        print("<td>", (tweet.full_text).encode('utf8'),  "</td>")       
        print("<td>", score,  "</td>")
        
        sql = "INSERT INTO tweets (date, keyword, text, sentiment) VALUES (%s, %s, %s, %s)"
        val = (tweet.created_at, term, tweet.full_text.encode('utf8'), score)
        mycursor.execute(sql, val)

        
#        print (tweet.created_at, tweet.full_text,"\n")
        print("</tr>")
        iter=iter+1
mydb.commit()        
csvFile.close()

print("</tbody>")
print("</table>")
print("</div>")

print("</body>")
print("</html>")

