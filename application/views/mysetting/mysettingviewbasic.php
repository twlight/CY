 <div class="col-sm-9">
  <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-sm-6"> <strong>简历<?php echo $basicinfo['ResumeID'];?></strong>
                      &nbsp
                      <a href="<?=base_url("/preview/getpreview/")?>/<?php echo $basicinfo['ResumeID']?>">预览简历</a>
                    </div>

                    <div class="col-sm-4 col-sm-offset-2">
                      <button class="btn btn-info btn-xs" ><a href="<?=base_url("resume/updatebasic/")?><?php echo $basicinfo['ResumeID']?>">保存基本信息</button>
                      
                      <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                        <span class="glyphicon glyphicon-trash"></span>
                        删除
                      </button>
                    </div>
                  </div>
                </div>
	<div class="panel-body">
                <div class="row">
                  <div class="col-md-4">
                    <h4> <strong>基本信息：</strong>
                    </h4>
                  </div>
               
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
				  
				   <p class = "name">UserID：           
                      <input type="text"  id="userid" name="userid" required value="<?php echo $basicinfo['UserID'];?>"></p>
                 
					 <p class = "name">姓名：                   
                      <input type="text"  id="basicname" name="basicname" required value="<?php echo $basicinfo['UserName'];?>"></p>

                    <p class = "gender">性别：                   
                      <input type="text"  id="basicgender" name="basicgender" required value="<?php echo $basicinfo['Gender'];?>";></p>

                    <p class = "tel">手机：
                      <input type="text"  id="basictel" name="basictel" required value="<?php echo $basicinfo['Tel'];?>"></p>

                    <p class=  "email">邮箱：                                        
                      <input type="text"  id="basicemail" required value="<?php echo $basicinfo['Email'];?>"></p>

                    <p class=  "address">居住地：                                      
                      <input type="text"  id="basicaddress" name="basicaddress" required value="<?php echo $basicinfo['Address'];?>"></p>

                    <p class = "politicystate">政治面貌：
                      <input type="text"  id="basicpoliticystate" name="basicpoliticystate" required value="<?php echo $basicinfo['PoliticyState'];?>"></p>

                    <p class = "birthofdate">出生年月：
                      <input type="text"  id="basicbirthofdate" name="basicbirthofdate" required value="<?php echo $basicinfo['Birth_of_Date'];?>"></p>
					
					 <p class = "birthofdate">开始时间
                      <input type="text"  id="starttime" name="starttime" required value="<?php echo $basicinfo['eduin'];?>"></p>
                  
					 <p class = "birthofdate">结束时间
                      <input type="text"  id="endtime" name="endtime" required value="<?php echo $basicinfo['eduout'];?>"></p>
                  
					 <p class = "birthofdate">所学专业
                      <input type="text" id="major" name="major" required value="<?php echo $basicinfo['Major'];?>"></p>
                  
					 <p class = "birthofdate">学历
                      <input type="text" id="xueli" name="xueli" required value="<?php echo $basicinfo['eduxueli'];?>"></p>
            			
				  </div>
				  
                  <div class="col-md-3">
                    <div class="thumbnail">
                      <img alt="140x140" src="<?=base_url("/static/img/top_logo.gif")?>" class="img-rounded"/>
                      <div class="caption">
                        <hr/>
                        <input class="input-file" id="photo" name="photo" type="file" value="上传照片"></div>
                    </div>
                  </div>
                </div>
             </div>
