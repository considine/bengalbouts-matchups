import requests
import sys

r = requests.post('http://159.203.163.157/submissions', data = {'submission': sys.argv[1]})
