cityareaname=new Array(35);
cityareacode=new Array(35);
function first(preP,preC,formname,selectP,selectC)
{
a=0;
if (selectP=='01')
{ a=1;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[1]=tempoption;');
cityareacode[0]=new Array('0101','0102','0103','0104','0105','0106','0107','0108');
cityareaname[0]=new Array('������','������','������','������','��̨��','ʯ��ɽ��');
if (selectP=='02')
{ a=2;tempoption=new Option('�½�','��',false,true); }
else
{ tempoption=new Option('�½�','��'); }
eval('document.'+formname+'.'+preP+'.options[2]=tempoption;');
cityareacode[1]=new Array('0201','0202','0203','0204','0205','0206','0207','0208','0209','0210','0211','0212','0213');
cityareaname[1]=new Array('��³ľ��','��������','ʯ����','��³��','����','����','������','��ʲ','��������','��������','����','��������','����');
if (selectP=='03')
{ a=3;tempoption=new Option('�Ϻ�','��',false,true); }
else
{ tempoption=new Option('�Ϻ�','��'); }
eval('document.'+formname+'.'+preP+'.options[3]=tempoption;');
cityareacode[2]=new Array('0301','0302','0303','0304','0305','0306','0307','0308','0309','0310','0311','0312','0313','0314','0315','0316','0317','0318','0319','0320');
cityareaname[2]=new Array('��ɽ','��ɽ','����','����','����','����','����','¬��','�ɽ�','����','�ֶ�','����','���','����','բ��','����','����','���','�ζ�','�ϻ�');
if (selectP=='04')
{ a=4;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[4]=tempoption;');
cityareacode[3]=new Array('0401','0402','0403','0404','0405','0406');
cityareaname[3]=new Array('����','����','ɳƺ��','�ϰ�','������','��ɿ�');
if (selectP=='05')
{ a=5;tempoption=new Option('���','��',false,true); }
else
{ tempoption=new Option('���','��'); }
eval('document.'+formname+'.'+preP+'.options[5]=tempoption;');
cityareacode[4]=new Array('0501','0502','0503','0504','0505','0506','0507','0508','0509','0510','0511','0512','0513','0514','0515');
cityareaname[4]=new Array('��ƽ','�ӱ�','����','�Ӷ�','�Ͽ�','����','����','����','���','����','����','����','����','����','����');
if (selectP=='06')
{ a=6;tempoption=new Option('�㶫','��',false,true); }
else
{ tempoption=new Option('�㶫','��'); }
eval('document.'+formname+'.'+preP+'.options[6]=tempoption;');
cityareacode[5]=new Array('0601','0602','0603','0604','0605','0606','0607','0608','0609','0610','0611','0612','0613','0614','0615');
cityareaname[5]=new Array('����','�麣','��ɽ','��ɽ','��ݸ','��Զ','����','����','տ��','�ع�','����','��Դ','��β','��ͷ','÷��');
if (selectP=='07')
{ a=7;tempoption=new Option('�ӱ�','��',false,true); }
else
{ tempoption=new Option('�ӱ�','��'); }
eval('document.'+formname+'.'+preP+'.options[7]=tempoption;');
cityareacode[6]=new Array('0701','0702','0703','0704','0705','0706','0707','0708','0709','0710','0711');
cityareaname[6]=new Array('ʯ��ׯ','��ɽ','�ػʵ�','����','��̨','�żҿ�','�е�','�ȷ�','����','����','��ˮ');
if (selectP=='08')
{ a=8;tempoption=new Option('ɽ��','��',false,true); }
else
{ tempoption=new Option('ɽ��','��'); }
eval('document.'+formname+'.'+preP+'.options[8]=tempoption;');
cityareacode[7]=new Array('0801','0802','0803','0804','0805','0806','0807');
cityareaname[7]=new Array('̫ԭ','��ͬ','��Ȫ','˷��','����','�ٷ�','����');
if (selectP=='09')
{ a=9;tempoption=new Option('���ɹ�','��',false,true); }
else
{ tempoption=new Option('���ɹ�','��'); }
eval('document.'+formname+'.'+preP+'.options[9]=tempoption;');
cityareacode[8]=new Array('0901','0902','0903','0904','0905','0906','0907','0908','0909','0910','0911');
cityareaname[8]=new Array('���ͺ���','��ͷ','�ں�','�ٺ�','��ʤ','����','���ֺ���','ͨ��','���','������','��������');
if (selectP=='10')
{ a=10;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[10]=tempoption;');
cityareacode[9]=new Array('1001','1002','1003','1004','1005','1006','1007','1008','1009','1010','1011','1012','1013','1014');
cityareaname[9]=new Array('����','����','��ɽ','����','����','�̽�','����','��˳','Ӫ��','����','����','��Ϫ','����','��«��');
if (selectP=='11')
{ a=11;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[11]=tempoption;');
cityareacode[10]=new Array('1101','1102','1103','1104','1105','1106','1107','1108','1109');
cityareaname[10]=new Array('����','����','��ƽ','��Դ','ͨ��','��ɽ','��ԭ','�׳�','�ӱ�');
if (selectP=='12')
{ a=12;tempoption=new Option('������','��',false,true); }
else
{ tempoption=new Option('������','��'); }
eval('document.'+formname+'.'+preP+'.options[12]=tempoption;');
cityareacode[11]=new Array('1201','1202','1203','1204','1205','1206','1207','1208','1209','1210','1211','1212','1213');
cityareaname[11]=new Array('������','�������','ĵ����','��ľ˹','����','����','�ں�','����','�׸�','˫Ѽɽ','��̨��','�绯','���˰���');
if (selectP=='13')
{ a=13;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[13]=tempoption;');
cityareacode[12]=new Array('1301','1302','1303','1304','1305','1306','1307','1308','1309','1310','1311','1312','1313');
cityareaname[12]=new Array('�Ͼ�','����','����','����','��','���Ƹ� ','����','���� ','��ͨ','�γ�','����','̩��','��Ǩ');
if (selectP=='14')
{ a=14;tempoption=new Option('�㽭','��',false,true); }
else
{ tempoption=new Option('�㽭','��'); }
eval('document.'+formname+'.'+preP+'.options[14]=tempoption;');
cityareacode[13]=new Array('1401','1402','1403','1404','1405','1406','1407','1408','1409','1410','1411');
cityareaname[13]=new Array('����','����','��ˮ','����','����','��ɽ','����','��','̨��','����','����');
if (selectP=='15')
{ a=15;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[15]=tempoption;');
cityareacode[14]=new Array('1501','1502','1503','1504','1505','1506','1507','1508','1509','1510','1511','1512','1513','1514','1515','1516','1517');
cityareaname[14]=new Array('�Ϸ�  ','�ߺ� ','���� ','���� ','���� ','���� ','��ɽ ','���� ','���� ','���� ','����ɽ ','ͭ��','���� ','���� ','���� ','���� ','����');
if (selectP=='16')
{ a=16;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[16]=tempoption;');
cityareacode[15]=new Array('1601','1602','1603','1604','1605','1606','1607','1608','1609');
cityareaname[15]=new Array('���� ','���� ','Ȫ�� ','���� ','���� ','��ƽ ','���� ','���� ','����');
if (selectP=='17')
{ a=17;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[17]=tempoption;');
cityareacode[16]=new Array('1701','1702','1703','1704','1705','1706','1707','1708','1709','1710','1711');
cityareaname[16]=new Array('�ϲ�','������','�Ž�','Ƽ��','����','ӥ̶','����','�˴�','����','����','����');
if (selectP=='18')
{ a=18;tempoption=new Option('ɽ��','³',false,true); }
else
{ tempoption=new Option('ɽ��','³'); }
eval('document.'+formname+'.'+preP+'.options[18]=tempoption;');
cityareacode[17]=new Array('1801','1802','1803','1804','1805','1806','1807','1808','1809','1810','1811','1812','1813','1814','1815','1816','1817');
cityareaname[17]=new Array('����','�ൺ','�Ͳ�','����','��̨','Ϋ��','����','̩��','����','����','����','��ׯ','����','����','�ĳ�','����','��Ӫ');
if (selectP=='19')
{ a=19;tempoption=new Option('����','ԥ',false,true); }
else
{ tempoption=new Option('����','ԥ'); }
eval('document.'+formname+'.'+preP+'.options[19]=tempoption;');
cityareacode[18]=new Array('1901','1902','1903','1904','1905','1906','1907','1908','1909','1910','1911','1912','1913','1914','1915','1916','1917','1918');
cityareaname[18]=new Array('֣��','����','����','ƽ��ɽ','����','�ױ�','����','����','���','����','���','����Ͽ','����','����','�ܿ�','פ����','����','��Դ');
if (selectP=='20')
{ a=20;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[20]=tempoption;');
cityareacode[19]=new Array('2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017');
cityareaname[19]=new Array('�人','��ʯ','ʮ��','����','�˲�','�差','����','����','Т��','�Ƹ�','����','��ʩ','����','����','����','Ǳ��','��ũ��');
if (selectP=='21')
{ a=21;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[21]=tempoption;');
cityareacode[20]=new Array('2101','2102','2103','2104','2105','2106','2107','2108','2109','2110','2111','2112','2113');
cityareaname[20]=new Array('��ɳ','����','��̶','����','����','����','����','����','����','����','����','¦��','���� ');
if (selectP=='22')
{ a=22;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[22]=tempoption;');
cityareacode[21]=new Array('2201','2202','2203','2204','2205','2206','2207','2208','2209','2210','2211','2212');
cityareaname[21]=new Array('����','����','����','����','����','���Ǹ�','����','���','����','����','��ɫ','�ӳ�');
if (selectP=='23')
{ a=23;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[23]=tempoption;');
cityareacode[22]=new Array('2301','2302','2303','2304','2305','2306','2307','2308','2309');
cityareaname[22]=new Array('���� ','����','ͨʲ','����','��ɽ','�Ĳ�','����','����','����');
if (selectP=='24')
{ a=24;tempoption=new Option('�Ĵ�','��',false,true); }
else
{ tempoption=new Option('�Ĵ�','��'); }
eval('document.'+formname+'.'+preP+'.options[24]=tempoption;');
cityareacode[23]=new Array('2401','2402','2403','2404','2405','2406','2407','2408','2409','2410','2411','2412','2413','2414','2415','2416','2417','2418','2419','2420');
cityareaname[23]=new Array('�ɶ�','�Թ�','��֦��','����','����','����','��Ԫ','����','�ڽ�','��ɽ','�ϳ�  ','�˱�','�㰲','�ﴨ','����','�Ű�','üɽ  ','���� ','���� ','��ɽ ');
if (selectP=='25')
{ a=25;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[25]=tempoption;');
cityareacode[24]=new Array('2501','2502','2503','2504','2505','2506','2507','2508','2509');
cityareaname[24]=new Array('���� ','����ˮ','����','ͭ��','�Ͻ�','��˳','ǭ���� ','ǭ����','ǭ��');
if (selectP=='26')
{ a=26;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[26]=tempoption;');
cityareacode[25]=new Array('2601','2602','2603','2604','2605','2606','2607','2608','2609','2610','2611','2612','2613','2614','2615','2616','2617');
cityareaname[25]=new Array('����','����','����','��Ϫ','��ͨ','˼é','�ٲ�','��ɽ','����','��ɽ ','��� ','��˫���� ','���� ','���� ','�º� ','ŭ��','����');
if (selectP=='27')
{ a=27;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[27]=tempoption;');
cityareacode[26]=new Array('2701','2702','2703','2704','2705','2706','2707');
cityareaname[26]=new Array('����','����','����','ɽ��','�տ���','����','��֥');
if (selectP=='28')
{ a=28;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[28]=tempoption;');
cityareacode[27]=new Array('2801','2802','2803','2804','2805','2806','2807','2808','2809','2810');
cityareaname[27]=new Array('����','ͭ��','����','����','μ��','�Ӱ�','����','����','����','����');
if (selectP=='29')
{ a=29;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[29]=tempoption;');
cityareacode[28]=new Array('2901','2902','2903','2904','2905','2906','2907','2908','2909','2910','2911','2912','2913','2914');
cityareaname[28]=new Array('����','���','����','��ˮ','������','����','ƽ��','����','¤��','����','��Ҵ','��Ȫ','���� ','����');
if (selectP=='30')
{ a=30;tempoption=new Option('�ຣ','��',false,true); }
else
{ tempoption=new Option('�ຣ','��'); }
eval('document.'+formname+'.'+preP+'.options[30]=tempoption;');
cityareacode[29]=new Array('3001','3002','3003','3004','3005','3006','3007','3008');
cityareaname[29]=new Array('����','����',' ���� ','����','����','����','����','����');
if (selectP=='31')
{ a=31;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[31]=tempoption;');
cityareacode[30]=new Array('3101','3102','3103','3104');
cityareaname[30]=new Array('����','ʯ��ɽ','����','��ԭ');
eval('document.'+formname+'.'+preP+'.options[a].selected=true;');
cityid=selectP;
if (cityid!='0')
{
b=0;for (i=0;i<cityareaname[cityid-1].length;i++)
{
if (selectC==cityareacode[cityid-1][i])
{b=i+1;tempoption=new Option(cityareaname[cityid-1][i],cityareacode[cityid-1][i],false,true);}
else
tempoption=new Option(cityareaname[cityid-1][i],cityareacode[cityid-1][i]);
eval('document.'+formname+'.'+preC+'.options[i+1]=tempoption;');
}
eval('document.'+formname+'.'+preC+'.options[b].selected=true;');
}
}
function selectcityarea(preP,preC,formname)
{
cityid=eval('document.'+formname+'.'+preP+'.selectedIndex;');
j=eval('document.'+formname+'.'+preC+'.length;');
for (i=1;i<j;i++)
{eval('document.'+formname+'.'+preC+'.options[j-i]=null;')}
if (cityid!="0")
{
for (i=0;i<cityareaname[cityid-1].length;i++)
{
tempoption=new Option(cityareaname[cityid-1][i],cityareacode[cityid-1][i]);
eval('document.'+formname+'.'+preC+'.options[i+1]=tempoption;');
}
}
}