$(document).ready(function(){
  //经营贷款 
    $('#buy-money-input').selectC({
        inputSelector: '#buy-money-input',
        data :[
            {
                text: '3',
                value: '3'
            },
            {
                text: '5',
                value: '5'
            },
            {
                text: '10',
                value: '10'
            },
            {
                text: '20',
                value: '20'
            },
            {
                text: '50',
                value: '50'
            },
            {
                text: '100',
                value: '100'
            },
            {
                text:'其他',
                value:'other'
            }
        ],
        isShowDw: true,
        isFocus:false
    });
    $('#buy-pay-period-input').selectC({
        inputSelector:'#buy-pay-period-input',
        data :[
            {
                text: '3',
                value: 3,
                DWtext: '个月'
            },
            {
                text: '6',
                value: 6,
                DWtext: '个月'
            },
            {
                text: '1',
                value: 1,
                DWtext: '年'
            },
            {
                text: '2',
                value:2,
                DWtext: '年'
            },
            {
                text: '3',
                value: 3,
                DWtext: '年'
            },
            {
                text: '5',
                value: 5,
                DWtext: '年'
            },
            {
                text:'10',
                value:10,
                DWtext: '年'
            }
        ],
        isShowDw: true,
        DWtext: '年',
        dwTpl : '<div class="selectC-dw">年</div>',
        change : function(val,dw){
       
            $('#buy-timeUnitInput').val(dw);
        }
    })
//消费贷款

   
    // $('#buy-money-input').selectC('hide');
    // $('#buy-pay-period').selectC('hide');




    $('#pay-type').selectC({
        inputSelector: '.daikuai-value',
        data :[
            {
                text: '不限',
                value: 'buy'
            },
            {
                text: '经营周转',
                value: 'business'
            },
            {
                text: '个人消费',
                value: 'buy'
            },
            {
                text: '贷款买车',
                value: 'car'
            },
            {
                text: '按揭买房',
                value: 'house'
            }
        ],
        change : function(val){
            switch (val){
                case 'business':
                    $('.show-form').find('.control-input').selectC('hide');
                    showForm('#' + val + '-form');
                    showBusiness();
                    $('#' + val + '-form').find('.control-input').selectC('show');
                    break;
                case 'buy':
                    $('.show-form').find('.control-input').selectC('hide');
                    showForm('#' + val + '-form');
                    
                    $('#' + val + '-form').find('.control-input').selectC('show');
                    break;
                case 'car' :
                    $('.show-form').find('.control-input').selectC('hide');
                    showForm('#' + val + '-form');
                    showCar();
                    $('#' + val + '-form').find('.control-input').selectC('show');
                    break;
                case 'house' :
                    $('.show-form').find('.control-input').selectC('hide');
                    showForm('#' + val + '-form');
                    showHouse();
                    $('#' + val + '-form').find('.control-input').selectC('show');
                    break;

            }   
            //$('#index-form').attr('action',route[val])
        }
    });


    // $('#business-form,  #buy-form, #car-form').on('submit', false, function(){
    //     var num = $(this).find('.num-check')[0].value;
    //     if (checkNum(num)) {
    //         return true;
    //     }
    //     return false
    // })

    function checkNum(val) {
        var reg = /^(-?\d+)(\.\d+)?/;
        if (reg.exec(val) == null || reg.exec(val)[0] != val || val < 0){
            //alert('非法内容');
            return false
        }
        return true
    } 
    function showForm(selector){
        $('.show-form').removeClass('show-form');
        $(selector).addClass('show-form');
    }
//个人消费
    function showBusiness(){
        $('#business-money-input').selectC({
            inputSelector: '#business-money-input',
            data :[
                {
                    text: '1',
                    value: '1'
                },
                {
                    text: '3',
                    value: '3'
                },
                {
                    text: '5',
                    value: '5'
                },
                {
                    text: '10',
                    value: '10'
                },
                {
                    text: '20',
                    value: '20'
                },
                {
                    text:'其他',
                    value:'other'
                }
            ],
            isShowDw: true,
            isFocus:false
        });

        $('#business-pay-period-input').selectC({
            inputSelector:'#business-pay-period-input',
            data :[
                {
                    text: '3',
                    value: 3,
                    DWtext: '个月'
                },
                {
                    text: '6',
                    value: 6,
                    DWtext: '个月'
                },
                {
                    text: '1',
                    value: 1,
                    DWtext: '年'
                },
                {
                    text: '2',
                    value:2,
                    DWtext: '年'
                },
                {
                    text: '3',
                    value: 3,
                    DWtext: '年'
                },
                {
                    text: '5',
                    value:5,
                    DWtext: '年'
                },
                {
                    text:'10',
                    value:10,
                    DWtext: '年'
                }
            ],
            isShowDw: true,
            DWtext: '年',
            dwTpl : '<div class="selectC-dw">年</div>',
            change : function(val,dw){
                    $('#business-timeUnitInput').val(dw);
                }
        })
    }

// 车贷

    function showCar(){
        $('#car-money-input').selectC({
            inputSelector: '#car-money-input',
            data :[
                {
                    text: '10',
                    value: '10'
                },
                {
                    text: '15',
                    value: '15'
                },
                {
                    text: '20',
                    value: '20'
                },
                {
                    text: '25',
                    value: '25'
                },
                {
                    text:'其他',
                    value:'other'
                }
            ],
            isShowDw: true,
            isFocus:false
        });

        $('#car-pay-period-input').selectC({
            inputSelector:'#car-pay-period-input',
            data :[
                {
                    text: '3',
                    value: 3,
                    DWtext: '年'
                },
                {
                    text: '2',
                    value: 2,
                    DWtext: '年'
                },
                {
                    text: '1',
                    value: 1,
                    DWtext: '年'
                },
                {
                    text: '6',
                    value: 6,
                    DWtext: '个月'
                }
            ],
            isShowDw: true,
            DWtext: '年',
            dwTpl : '<div class="selectC-dw">年</div>',
            change : function(val,dw){
                    $('#car-timeUnitInput').val(dw);
                }
        })
    }

    function showHouse(){
        $('#house-money-input').selectC({
            inputSelector: '#house-money-input',
            data :[
                {
                    text: '20',
                    value: '20'
                },
                {
                    text: '50',
                    value: '50'
                },
                {
                    text: '80',
                    value: '80'
                },
                {
                    text: '100',
                    value: '100'
                },
                {
                    text:'其他',
                    value:'other'
                }
            ],
            isShowDw: true,
            isFocus:false
        });

        $('#house-pay-period-input').selectC({
            inputSelector:'#house-pay-period-input',
            data :[
                {
                    text: '5',
                    value: 5,
                    DWtext: '年'
                },
                {
                    text: '10',
                    value: 10,
                    DWtext: '年'
                },
                {
                    text: '15',
                    value: 15,
                    DWtext: '年'
                },
                {
                    text: '20',
                    value: 20,
                    DWtext: '年'
                },
                {
                    text: '25',
                    value: 25,
                    DWtext: '年'
                },
                {
                    text: '30',
                    value: 30,
                    DWtext: '年'
                }
            ],
            isShowDw: true,
            DWtext: '年',
            dwTpl : '<div class="selectC-dw">年</div>'
        })   
    }
if ($.browser.msie && ($.browser.version == '7.0' || $.browser.version == '6.0')) {
    $(".banner-icon-lbs").animate({top:"241px",opacity:1},1000);
    $(".banner-icon-line").animate({width:"101px",opacity:1},2000);  
}else{
    $(".banner-icon-lbs").animate({top:"190px",opacity:1},1000);
    $(".banner-icon-line").animate({width:"101px",opacity:1},2000);  
}
//表单校验



});