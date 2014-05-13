
           <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><?php
							$iter = ($this->session->userdata('iter'));
							$UserName = $iter['name'];
							
							if($UserName)
							{
							echo $UserName;
							$resumeitems = $resume_items[0];
					
							
						?></h3>
                        <p><?php echo $resumeitems['Gender'];?>, 出生日期：<?php echo $resumeitems['Birth_of_Date'];?></p>
                        <p>地址:<?php echo $resumeitems['Address']; ?></p>
                        <p>手机：<?php echo $resumeitems['Tel']; ?></p>
                        <p>邮箱：<?php echo $resumeitems['Email']; ?></p>
                        <br/>
                        <h4> <strong>教育信息</strong>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4"><?php echo $resumeitems['eduin']." 至 ".$resumeitems['eduout']; ?></div>
                            <div class="col-sm-3"><?php echo $resumeitems['School']; ?></div>
                            <div class="col-sm-3"><?php echo $resumeitems['Major']; ?></div>
                            <div class="col-sm-2"><?php echo $resumeitems['eduxueli']; ?></div>
                        </div>
                        <br/>
                        <h4> <strong>语言能力</strong>
                        </h4>
                        <hr>
						<?php
							foreach($lang_items_array as $row)
							{
							echo	"<div class=\"row\">";
							echo	"<div class=\"col-sm-2\"></div>";
							echo 	"<div class=\"col-sm-3\">";
							echo $row['category'];
							echo  "</div><div class=\"col-sm-3\">";
							echo $row['rank']."</div><div class=\"col-sm-4\">";
							echo $row['score']."分</div></div>";
							}
						?>
                       
                        <br/>
                        <h4>
                            <strong>校内职务</strong>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2">2011.09-2015.07</div>
                            <div class="col-sm-3">信息学院学生会</div>
                            <div class="col-sm-3">网宣部部长</div>
                            <div class="col-sm-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">2011.09-2015.07</div>
                            <div class="col-sm-3">XX社团</div>
                            <div class="col-sm-3">主席</div>
                            <div class="col-sm-4"></div>
                        </div>
                        <br/>
                        <h4>
                            <strong>实习经历</strong>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2">2011.09-2015.07</div>
                            <div class="col-sm-3">xx科技有限公司</div>
                            <div class="col-sm-3">PHP程序员实习生</div>
                            <div class="col-sm-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <p class="text-muted">职位描述XXX负责xxx的实现</p>
                            </div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-4"></div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">2011.09-2015.07</div>
                            <div class="col-sm-3">xx科技集团</div>
                            <div class="col-sm-3">PHP程序员实习生</div>
                            <div class="col-sm-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <p class="text-muted">职位描述XXX负责xxx的实现</p>
                            </div>
                        </div>

                        <h4>
                            <strong>项目经历</strong>
                        </h4>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-3">ITers学子交流系统</div>
                            <div class="col-sm-3">6人团队</div>
                            <div class="col-sm-4">负责XXX的实现</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <p class="text-muted">项目介绍xxxxx该系统xxxxxxx</p>
                            </div>
                        </div>
                        <h4>
                            <strong>所获奖励</strong>
                        </h4>
                        <div class="row">
                            <div class="col-sm-2">2011.09</div>
                            <div class="col-sm-3">xxx奖</div>
                            <div class="col-sm-3">中山大学</div>
                            <div class="col-sm-4"></div>
                        </div>
                        <br/>
                        <hr>
                        <h4>
                            <strong>其他</strong>
                        </h4>
                    </div>
					<?php
						}
						else
						{
							echo "请先登陆,呵呵";
						}
					?>
                </div>
            </div>
            <div class="col-sm-1"></div>

        </div>
            </div>
            <div class="col-sm-1"></div>
       

