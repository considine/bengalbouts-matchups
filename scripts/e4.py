#! /Users/johnpconsidine/anaconda/bin/python
#!/usr/bin/env python
from email.mime.text import MIMEText
from email.mime.application import MIMEApplication
from email.mime.multipart import MIMEMultipart
from smtplib import SMTP
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
subj = sys.argv[i]
i+=1
mes = sys.argv[i]
to = ", "
to_l = []
for x in range(len(sys.argv)):
        if x > i:
                to_l.append(sys.argv[x])
print "The subj is ", subj, "The Message is ", mes, " and to_l is "
print to_l
#recipients = ['jconsidi@nd.edu', 'boxing@nd.edu'] 
#recipients = to_l

emaillist = [elem.strip().split(',') for elem in to_l]

emaillist = to_l
msg = MIMEMultipart()
msg['To'] = ",".join(to_l)
print emaillist
msg['Subject'] = subj
msg['From'] = 'Jack Considine <jconsidi@nd.edu>'
#msg['Reply-to'] = 'jconsidi@nd.edu'
 
msg.preamble = 'Multipart massage.\n'
 
part = MIMEText(mes)
msg.attach(part)
if attach:
	part = MIMEApplication(open(str(sys.argv[2]),"rb").read())
	part.add_header('Content-Disposition', 'attachment', filename=str(sys.argv[2]))
	msg.attach(part)
 

server = smtplib.SMTP("smtp.gmail.com:587")
server.ehlo()
server.starttls()
server.login("jconsidi@nd.edu", "JackConsidine!")
 
server.sendmail(msg['From'], emaillist , msg.as_string())
