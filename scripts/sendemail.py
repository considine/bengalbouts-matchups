#! /afs/nd.edu/user14/csesoft/new/bin/python
from email.mime.text import MIMEText
from email.mime.application import MIMEApplication
from email.mime.multipart import MIMEMultipart
from smtplib import SMTP
import os
import smtplib
import sys

attach = False
i = 1

print "args:"
it =0
for item in sys.argv:
	print item, it
	it+=1

if sys.argv[1] == "attachment":
	attach = True
	i+=2


print "i is ", i
subj = "Your bengalbouts picks!"
mes = "Your bengalbouts picks"


#recipients = ['jconsidi@nd.edu', 'boxing@nd.edu'] 
#recipients = to_l



msg = MIMEMultipart()
msg['To'] = sys.argv[1]

msg['Subject'] = subj
msg['From'] = 'Jack Considine <jconsidi@nd.edu>'
#msg['Reply-to'] = 'jconsidi@nd.edu'
 
msg.preamble = 'Multipart massage.\n'
 
part = MIMEText(mes)
msg.attach(part)

 

server = smtplib.SMTP("smtp.gmail.com:587")
server.ehlo()
server.starttls()
server.login(os.getenv("email"), os.getenv("password"))
 
server.sendmail(msg['From'], sys.argv[1] , msg.as_string())