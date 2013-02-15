import sys
text=open("query","r").read();
#text = raw_input()
y = text.split()
link = "www.flipkart.com/search-books/"

for word in y:
	a = word + "+"
	link= link + a

link = link[:len(link)-1]

import os
os.system("wget -q -O ./title "+ link)

fo = open("title", "r")
j=0

line = fo.readlines()
flag=0
i=0
k=0
min=100000
for i in range(len(line)):
	flag=0
	x = line[i]
	num=0
	for j in range(len(x)):
		if x[j:j+11]=="final-price":
			j=j+18
			while (str.isdigit(x[j])):
				num=num*10
				num=num+int(x[j])
				j=j+1
			if (min>num):
				min=num
	
print "The minimum cost of ",text," is Rs.",min,". Thank you for using this service!"
fo.close()

