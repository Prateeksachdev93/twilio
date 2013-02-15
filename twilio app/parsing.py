import re
fp = open("lyrics.txt", "r")
buff = ' '.join(fp.readlines())
text = buff.split(' ')
searchURL = "http://search.azlyrics.com/search.php?q="
for i in range(len(text)):
	searchURL += text[i]
	searchURL += "+"
searchURL = searchURL[:-1]
import urllib2 
usock = urllib2.urlopen(searchURL)
data = usock.read().split('\n')
#searchResult.write(data[52])
tempURL = list(data[52])
flag = False;
finalURL = ""
for i in range(len(tempURL)):
	if(flag == True):
		finalURL += tempURL[i]
	if(tempURL[i]=="\"" and not(flag)):
		flag = True
	elif(tempURL[i]=="\""and flag):
		break
finalURL = finalURL[:-1]
fp.close()
usock.close()

data = urllib2.urlopen(finalURL)
buff = ' '.join(data)
text = buff.split('\n')
f = open("output.txt", "w+")

def index_containing_substring(the_list, substring):
	    for i, s in enumerate(the_list):
	    	if substring in s:
	               return i
            return -1

substring_start="<!-- start of lyrics -->"
index_start = index_containing_substring(text, substring_start)
substring_end = "<!-- end of lyrics -->"
index_end = index_containing_substring(text, substring_end)

final_result=[]

i=index_start+1

while i<index_end:
	if '[' not in list(text[i]):
		final_result = final_result + [text[i].strip('<br />')]
	i+=1
n = len(final_result)
final_result[n-1] = final_result[n-1][:-1]
i=0
while i<n:
	f.write(final_result[i]+'\n')
	i+=1
final_result[0]=1
f.close()

