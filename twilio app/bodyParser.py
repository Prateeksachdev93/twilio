ans = str(open("userRequest","r").readline()).split()
fp = open("category","w")
fp.write(str(str(ans[0])))
fp.close()
fp = open("query","w")
fullQuery = ""
for i in ans[1:]:
	fullQuery+=i
	fullQuery+=" "
fullQuery = fullQuery[:-1]
fp.write(fullQuery)
fp.close()
