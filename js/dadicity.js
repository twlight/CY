// JavaScript Document
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
cityareacode[0]=new Array('110101','110102','110103','110104','110105','110106','110107','110108','110109','110111','110112','110113','110114','110115','110116','110117','110228','110229');
cityareaname[0]=new Array('������','������','������','������','������','��̨��','ʯ��ɽ��','������','��ͷ����','��ɽ��','ͨ����','˳����','��ƽ��','������','������','ƽ����','������','������');
if (selectP=='02')
{ a=2;tempoption=new Option('�½�','��',false,true); }
else
{ tempoption=new Option('�½�','��'); }
eval('document.'+formname+'.'+preP+'.options[2]=tempoption;');
cityareacode[1]=new Array('650100','650200','652101','652201','652301','652302','652303','652701','652801','652901','653001','653101','653201','654002','654003','654201','654202','654301','659001','659002','659003','659004');
cityareaname[1]=new Array('��³ľ����','����������','��³����','������','������','������','��Ȫ��','������','�������','��������','��ͼʲ��','��ʲ��','������','������','������','������','������','����̩��','ʯ������','��������','ͼľ�����','�������');
if (selectP=='03')
{ a=3;tempoption=new Option('�Ϻ�','��',false,true); }
else
{ tempoption=new Option('�Ϻ�','��'); }
eval('document.'+formname+'.'+preP+'.options[3]=tempoption;');
cityareacode[2]=new Array('310101','310103','310104','310105','310106','310107','310108','310109','310110','310112','310113','310114','310115','310116','310117','310118','310119','310120');
cityareaname[2]=new Array('������','¬����','�����','������','������','������','բ����','�����','������','������','��ɽ��','�ζ���','�ֶ�����','��ɽ��','�ɽ���','������','�ϻ���','������');
if (selectP=='04')
{ a=4;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[4]=tempoption;');
cityareacode[3]=new Array('500100','500101','500102','500103','500104','500105','500106','500107','500108','500109','500110','500111','500112','500113','500114','500115','500116','500117','500118','500119');
cityareaname[3]=new Array('��Ͻ��','������','������','������','��ɿ���','������','ɳƺ����','��������','�ϰ���','������','��ʢ��','˫����','�山��','������','ǭ����','������','������','�ϴ���','������','�ϴ���');
if (selectP=='05')
{ a=5;tempoption=new Option('���','��',false,true); }
else
{ tempoption=new Option('���','��'); }
eval('document.'+formname+'.'+preP+'.options[5]=tempoption;');
cityareacode[4]=new Array('120101','120102','120103','120104','120105','120106','120107','120108','120109','120110','120111','120112','120113','120114','120115');
cityareaname[4]=new Array('��ƽ��','�Ӷ���','������','�Ͽ���','�ӱ���','������','������','������','�����','������','������','������','������','������','������');
if (selectP=='06')
{ a=6;tempoption=new Option('�㶫','��',false,true); }
else
{ tempoption=new Option('�㶫','��'); }
eval('document.'+formname+'.'+preP+'.options[6]=tempoption;');
cityareacode[5]=new Array('440100','440183','440184','440200','440281','440282','440300','440400','440600','440700','440781','440783','440784','440785','440800','440881','440882','440883','440900','440981','440982','440983','441200','441283','441284','441300','441400','441481','441500','441581','441600','441700','441781','441800','441881','441882','441900','442000','445100','445200','445281','445300','445381');
cityareaname[5]=new Array('������','������','�ӻ���','�ع���','�ֲ���','������','������','�麣��','��ɽ��','������','̨ɽ��','��ƽ��','��ɽ��','��ƽ��','տ����','������','������','�⴨��','ï����','������','������','������','������','��Ҫ��','�Ļ���','������','÷����','������','��β��','½����','��Դ��','������','������','��Զ��','Ӣ����','������','��ݸ��','��ɽ��','������','������','������','�Ƹ���','�޶���');
if (selectP=='07')
{ a=7;tempoption=new Option('�ӱ�','��',false,true); }
else
{ tempoption=new Option('�ӱ�','��'); }
eval('document.'+formname+'.'+preP+'.options[7]=tempoption;');
cityareacode[6]=new Array('130100','130181','130182','130183','130184','130185','130200','130281','130283','130300','130400','130481','130500','130581','130582','130600','130681','130682','130683','130684','130700','130800','130900','130981','130982','130983','130984','131000','131081','131082','131100','131181','131182');
cityareaname[6]=new Array('ʯ��ׯ��','������','޻����','������','������','¹Ȫ��','��ɽ��','����','Ǩ����','�ػʵ���','������','�䰲��','��̨��','�Ϲ���','ɳ����','������','������','������','������','�߱�����','�żҿ���','�е���','������','��ͷ��','������','������','�Ӽ���','�ȷ���','������','������','��ˮ��','������','������');
if (selectP=='08')
{ a=8;tempoption=new Option('ɽ��','��',false,true); }
else
{ tempoption=new Option('ɽ��','��'); }
eval('document.'+formname+'.'+preP+'.options[8]=tempoption;');
cityareacode[7]=new Array('140100','140181','140200','140300','140400','140481','140500','140581','140600','140700','140781','140800','140881','140882','140900','140981','141000','141081','141082','141100','141181','141182');
cityareaname[7]=new Array('̫ԭ��','�Ž���','��ͬ��','��Ȫ��','������','º����','������','��ƽ��','˷����','������','������','�˳���','������','�ӽ���','������','ԭƽ��','�ٷ���','������','������','������','Т����','������');
if (selectP=='09')
{ a=9;tempoption=new Option('���ɹ�','��',false,true); }
else
{ tempoption=new Option('���ɹ�','��'); }
eval('document.'+formname+'.'+preP+'.options[9]=tempoption;');
cityareacode[8]=new Array('150100','150200','150300','150400','150500','150700','150781','150782','150783','150784','150785','150800','150900','150981','152201','152202','152501','152502');
cityareaname[8]=new Array('���ͺ�����','��ͷ��','�ں���','�����','ͨ����','���ױ�����','��������','����ʯ��','��������','���������','������','�����׶���','�����첼��','������','����������','����ɽ��','����������','���ֺ�����');
if (selectP=='10')
{ a=10;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[10]=tempoption;');
cityareacode[9]=new Array('210100','210181','210200','210281','210282','210283','210300','210381','210400','210500','210600','210681','210682','210700','210781','210782','210800','210881','210882','210900','211000','211081','211100','211200','211281','211282','211300','211381','211382','211400','211481');
cityareaname[9]=new Array('������','������','������','�߷�����','��������','ׯ����','��ɽ��','������','��˳��','��Ϫ��','������','������','�����','������','�躣��','������','Ӫ����','������','��ʯ����','������','������','������','�̽���','������','����ɽ��','��ԭ��','������','��Ʊ��','��Դ��','��«����','�˳���');
if (selectP=='11')
{ a=11;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[11]=tempoption;');
cityareacode[10]=new Array('220100','220181','220182','220183','220200','220281','220282','220283','220284','220300','220381','220382','220400','220500','220581','220582','220600','220681','220700','220800','220881','220882','222401','222402','222403','222404','222405','222406');
cityareaname[10]=new Array('������','��̨��','������','�»���','������','�Ժ���','�����','������','��ʯ��','��ƽ��','��������','˫����','��Դ��','ͨ����','÷�ӿ���','������','��ɽ��','�ٽ���','��ԭ��','�׳���','�����','����','�Ӽ���','ͼ����','�ػ���','������','������','������');
if (selectP=='12')
{ a=12;tempoption=new Option('������','��',false,true); }
else
{ tempoption=new Option('������','��'); }
eval('document.'+formname+'.'+preP+'.options[12]=tempoption;');
cityareacode[11]=new Array('230100','230182','230183','230184','230200','230281','230300','230381','230382','230400','230500','230600','230700','230722','230781','230800','230881','230882','230900','231000','231081','231083','231084','231085','231100','231181','231182','231200','231281','231282','231283');
cityareaname[11]=new Array('��������','˫����','��־��','�峣��','���������','ګ����','������','������','��ɽ��','�׸���','˫Ѽɽ��','������','������','������','������','��ľ˹��','ͬ����','������','��̨����','ĵ������','��Һ���','������','������','������','�ں���','������','���������','�绯��','������','�ض���','������');
if (selectP=='13')
{ a=13;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[13]=tempoption;');
cityareacode[12]=new Array('320100','320200','320281','320282','320300','320381','320382','320400','320481','320482','320500','320581','320582','320583','320584','320585','320600','320681','320682','320683','320684','320700','320800','320900','320981','320982','321000','321081','321084','321088','321100','321181','321182','321183','321200','321281','321282','321283','321284','321300');
cityareaname[12]=new Array('�Ͼ���','������','������','������','������','������','������','������','������','��̳��','������','������','�żҸ���','��ɽ��','�⽭��','̫����','��ͨ��','������','�����','ͨ����','������','���Ƹ���','������','�γ���','��̨��','�����','������','������','������','������','����','������','������','������','̩����','�˻���','������','̩����','������','��Ǩ��');
if (selectP=='14')
{ a=14;tempoption=new Option('�㽭','��',false,true); }
else
{ tempoption=new Option('�㽭','��'); }
eval('document.'+formname+'.'+preP+'.options[14]=tempoption;');
cityareacode[13]=new Array('330100','330182','330183','330185','330200','330281','330282','330283','330300','330381','330382','330400','330481','330482','330483','330500','330600','330681','330682','330683','330700','330781','330782','330783','330784','330800','330881','330900','331000','331081','331082','331100','331181');
cityareaname[13]=new Array('������','������','������','�ٰ���','������','��Ҧ��','��Ϫ��','���','������','����','������','������','������','ƽ����','ͩ����','������','������','������','������','������','����','��Ϫ��','������','������','������','������','��ɽ��','��ɽ��','̨����','������','�ٺ���','��ˮ��','��Ȫ��');
if (selectP=='15')
{ a=15;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[15]=tempoption;');
cityareacode[14]=new Array('340100','340200','340300','340400','340500','340600','340700','340800','340881','341000','341100','341181','341182','341200','341282','341300','341400','341500','341600','341700','341800','341881');
cityareaname[14]=new Array('�Ϸ���','�ߺ���','������','������','����ɽ��','������','ͭ����','������','ͩ����','��ɽ��','������','�쳤��','������','������','������','������','������','������','������','������','������','������');
if (selectP=='16')
{ a=16;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[16]=tempoption;');
cityareacode[15]=new Array('350100','350181','350182','350200','350300','350400','350481','350500','350581','350582','350583','350600','350681','350700','350781','350782','350783','350784','350800','350881','350900','350981','350982');
cityareaname[15]=new Array('������','������','������','������','������','������','������','Ȫ����','ʯʨ��','������','�ϰ���','������','������','��ƽ��','������','����ɽ��','�����','������','������','��ƽ��','������','������','������');
if (selectP=='17')
{ a=17;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[17]=tempoption;');
cityareacode[16]=new Array('360100','360200','360281','360300','360400','360481','360500','360600','360681','360700','360781','360782','360800','360881','360900','360981','360982','360983','361000','361100','361181');
cityareaname[16]=new Array('�ϲ���','��������','��ƽ��','Ƽ����','�Ž���','�����','������','ӥ̶��','��Ϫ��','������','�����','�Ͽ���','������','����ɽ��','�˴���','�����','������','�߰���','������','������','������');
if (selectP=='18')
{ a=18;tempoption=new Option('ɽ��','³',false,true); }
else
{ tempoption=new Option('ɽ��','³'); }
eval('document.'+formname+'.'+preP+'.options[18]=tempoption;');
cityareacode[17]=new Array('370100','370181','370200','370281','370282','370283','370284','370285','370300','370400','370481','370500','370600','370681','370682','370683','370684','370685','370686','370687','370700','370781','370782','370783','370784','370785','370786','370800','370881','370882','370883','370900','370982','370983','371000','371081','371082','371083','371100','371200','371300','371400','371481','371482','371500','371581','371600','371700');
cityareaname[17]=new Array('������','������','�ൺ��','������','��ī��','ƽ����','������','������','�Ͳ���','��ׯ��','������','��Ӫ��','��̨��','������','������','������','������','��Զ��','��ϼ��','������','Ϋ����','������','�����','�ٹ���','������','������','������','������','������','������','�޳���','̩����','��̩��','�ʳ���','������','�ĵ���','�ٳ���','��ɽ��','������','������','������','������','������','������','�ĳ���','������','������','������');
if (selectP=='19')
{ a=19;tempoption=new Option('����','ԥ',false,true); }
else
{ tempoption=new Option('����','ԥ'); }
eval('document.'+formname+'.'+preP+'.options[19]=tempoption;');
cityareacode[18]=new Array('410181','410182','410183','410184','410185','410200','410300','410381','410400','410481','410482','410500','410581','410600','410700','410781','410782','410800','410881','410882','410883','410900','411000','411081','411082','411100','411200','411281','411282','411300','411381','411400','411481','411500','411600','411681','411700');
cityareaname[18]=new Array('������','������','������','��֣��','�Ƿ���','������','������','��ʦ��','ƽ��ɽ��','�����','������','������','������','�ױ���','������','������','������','������','��Դ��','������','������','�����','������','������','������','�����','����Ͽ��','������','�鱦��','������','������','������','������','������','�ܿ���','�����','פ������');
if (selectP=='20')
{ a=20;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[20]=tempoption;');
cityareacode[19]=new Array('420100','420200','420281','420300','420381','420500','420581','420582','420583','420600','420682','420683','420684','420700','420800','420881','420900','420981','420982','420984','421000','421081','421083','421087','421100','421181','421182','421200','421281','421300','421381','429004','429005','429006');
cityareaname[19]=new Array('�人��','��ʯ��','��ұ��','ʮ����','��������','�˲���','�˶���','������','֦����','�差��','�Ϻӿ���','������','�˳���','������','������','������','Т����','Ӧ����','��½��','������','������','ʯ����','�����','������','�Ƹ���','�����','��Ѩ��','������','�����','������','��ˮ��','������','Ǳ����','������');
if (selectP=='21')
{ a=21;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[21]=tempoption;');
cityareacode[20]=new Array('430100','430181','430200','430281','430300','430381','430382','430400','430481','430482','430500','430581','430600','430681','430682','430700','430781','430800','430900','430981','431000','431081','431100','431200','431281','431300','431381','431382','433101');
cityareaname[20]=new Array('��ɳ��','�����','������','������','��̶��','������','��ɽ��','������','������','������','������','�����','������','������','������','������','������','�żҽ���','������','�佭��','������','������','������','������','�齭��','¦����','��ˮ����','��Դ��','������');
if (selectP=='22')
{ a=22;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[22]=tempoption;');
cityareacode[21]=new Array('450100','450200','450300','450400','450481','450500','450600','450681','450700','450800','450881','450900','450981','451000','451100','451200','451281','451300','451381','451400','451481');
cityareaname[21]=new Array('������','������','������','������','�Ϫ��','������','���Ǹ���','������','������','�����','��ƽ��','������','������','��ɫ��','������','�ӳ���','������','������','��ɽ��','������','ƾ����');
if (selectP=='23')
{ a=23;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[23]=tempoption;');
cityareacode[22]=new Array('460100');
cityareaname[22]=new Array('������');
if (selectP=='24')
{ a=24;tempoption=new Option('�Ĵ�','��',false,true); }
else
{ tempoption=new Option('�Ĵ�','��'); }
eval('document.'+formname+'.'+preP+'.options[24]=tempoption;');
cityareacode[23]=new Array('510100','510181','510182','510183','510184','510300','510400','510500','510600','510681','510682','510683','510700','510781','510800','510900','511000','511100','511181','511300','511381','511400','511500','511600','511681','511700','511781','511800','511900','512000','512081','513401');
cityareaname[23]=new Array('�ɶ���','��������','������','������','������','�Թ���','��֦����','������','������','�㺺��','ʲ����','������','������','������','��Ԫ��','������','�ڽ���','��ɽ��','��üɽ��','�ϳ���','������','üɽ��','�˱���','�㰲��','������','������','��Դ��','�Ű���','������','������','������','������');
if (selectP=='25')
{ a=25;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[25]=tempoption;');
cityareacode[24]=new Array('520100','520181','520200','520300','520381','520382','520400','522201','522301','522401','522601','522701','522702');
cityareaname[24]=new Array('������','������','����ˮ��','������','��ˮ��','�ʻ���','��˳��','ͭ����','������','�Ͻ���','������','������','��Ȫ��');
if (selectP=='26')
{ a=26;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[26]=tempoption;');
cityareacode[25]=new Array('530100','530181','530300','530381','530400','530500','530600','530700','530800','530900','532301','532501','532502','532801','532901','533102','533103');
cityareaname[25]=new Array('������','������','������','������','��Ϫ��','��ɽ��','��ͨ��','������','˼é��','�ٲ���','������','������','��Զ��','������','������','������','º����');
if (selectP=='27')
{ a=27;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[27]=tempoption;');
cityareacode[26]=new Array('540100','542301');
cityareaname[26]=new Array('������','�տ�����');
if (selectP=='28')
{ a=28;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[28]=tempoption;');
cityareacode[27]=new Array('610100','610200','610300','610400','610481','610500','610581','610582','610600','610700','610800','610900','611000');
cityareaname[27]=new Array('������','ͭ����','������','������','��ƽ��','μ����','������','������','�Ӱ���','������','������','������','������');
if (selectP=='29')
{ a=29;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[29]=tempoption;');
cityareacode[28]=new Array('620100','620200','620300','620400','620500','620600','620700','620800','620900','620981','620982','621000','621100','621200','622901','623001');
cityareaname[28]=new Array('������','��������','�����','������','��ˮ��','������','��Ҵ��','ƽ����','��Ȫ��','������','�ػ���','������','������','¤����','������','������');
if (selectP=='30')
{ a=30;tempoption=new Option('�ຣ','��',false,true); }
else
{ tempoption=new Option('�ຣ','��'); }
eval('document.'+formname+'.'+preP+'.options[30]=tempoption;');
cityareacode[29]=new Array('630100');
cityareaname[29]=new Array('������');
if (selectP=='31')
{ a=31;tempoption=new Option('����','��',false,true); }
else
{ tempoption=new Option('����','��'); }
eval('document.'+formname+'.'+preP+'.options[31]=tempoption;');
cityareacode[30]=new Array('640100','640181','640200','640300','640381','640400','640500');
cityareaname[30]=new Array('������','������','ʯ��ɽ��','������','��ͭϿ��','��ԭ��','������');
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