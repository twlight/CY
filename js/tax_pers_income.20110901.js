//个税
$(function ()
{

    $("#incomeType").buttonset();

    $("#startAmt").val(window.personTaxBase);

    //利率随存储类型而改�?
    $("#incomeType").change(function ()
    {
        var T = $("#incomeType").val();
        if(T == "1")
        {
            $("#insureTR,#startTR").show();
        } else
        {
            $("#insureTR,#startTR").hide();
        }
    }).change();

    //
    $("#intAmt").submit(function (e)
    {
        e.preventDefault();

        var A = parseFloat($("#incomeAmt").val()),
			B = parseFloat($("#insureAmt").val()),
			C = parseFloat($("#startAmt").val()),
			T = $("#incomeType").val(),
			D = E = 0
			;

        switch(T)
        {
            /*
            工资、薪金所得（1�?
            */ 
            case "1":
                var L = A - B - C;
                var R = K = 0;
                if(A <= C)
                {
                    D = 0;
                    E = A;
                    break;
                }
                if(L <= 1500)
                {
                    R = 0.03;K = 0;
                } else if(L <= 4500)
                {
                    R = 0.1;K = 105;
                } else if(L <= 9000)
                {
                    R = 0.2;K = 555;
                } else if(L <= 35000)
                {
                    R = 0.25;K = 1005;
                } else if(L <= 55000)
                {
                    R = 0.30;K = 2755;
                } else if(L <= 80000)
                {
                    R = 0.35;K = 5505;
                } else
                {
                    R = 0.45;K = 13505;
                }

                D = L * R - K;
                E = A - B - D;
                break;
            /*
            个体工商户的生产、经营所得（年度）（2�?	
            */ 
            case "2":
            case "3":
                var R = K = 0;

                if(A <= 15000)
                {
                    R = 0.05;K = 0;
                } else if(A <= 30000)
                {
                    R = 0.1;K = 750;
                } else if(A <= 60000)
                {
                    R = 0.2;K = 3750;
                } else if(A <= 100000)
                {
                    R = 0.3;K = 9750;
                } else
                {
                    R = 0.35;K = 14750;
                }
                D = A * R - K;
                E = A - D;
                break;
            /*
            对企事业单位的承包经营、承租经营所得（年度）（3�?
            case "3":
            var L = A - 800 * 12;
            var R = K = 0;
				
            if ( L <= 5000 ){
            R = 0.05; K=0;
            }else if ( L <= 10000 ){
            R = 0.1; K=250;
            }else if ( L <= 30000 ){
            R = 0.2; K=1250;
            }else if ( L <= 50000 ){
            R = 0.3; K=4250;
            }else{
            R = 0.35; K=6750;
            }
            D = L * R - K;
            E = A -D ;
            break;
            */ 
            /*
            劳务报酬所得（4�?	
            */ 
            case "4":
                if(A <= 800)
                {
                    D = 0;
                    E = A - D;
                } else if(A <= 4000)
                {
                    D = (A - 800) * window.personUnexpectedRate;
                    E = A - D;
                } else
                {
                    var R = K = 0,
						tmp = A * (1 - window.personUnexpectedRate);

                    if(tmp <= 20000)
                    {
                        R = 0.2;K = 0;
                    } else if(tmp <= 50000)
                    {
                        R = 0.3;K = 2000;
                    } else
                    {
                        R = 0.4;K = 7000;
                    }

                    D = A * (1 - window.personUnexpectedRate) * R - K;
                    E = A - D;
                }
                break;
            /*
            稿酬所得（5�?
            */ 
            case "5":
                if(A <= 800)
                {
                    D = 0;
                    E = A - D;
                } else if(A <= 4000)
                {
                    D = (A - 800) * window.personUnexpectedRate * (1 - window.personPaperRate);
                    E = A - D;
                } else
                {
                    D = A * (1 - window.personUnexpectedRate) * window.personUnexpectedRate * (1 - window.personPaperRate);
                    E = A - D;
                }
                break;
            /*
            特需权使用费所得（6�?
            �?��租赁所得（7�?	
            */ 
            case "6":
            case "7":
                if(A <= 800)
                {
                    D = 0;
                    E = A - D;
                } else if(A <= 4000)
                {
                    D = (A - 800) * window.personUnexpectedRate;
                    E = A - D;
                } else
                {
                    D = A * (1 - window.personUnexpectedRate) * window.personUnexpectedRate;
                    E = A - D;
                }
                break;

            /*
            �?��转让所得（8�?
            利息、股息、红利所得（9�?
            偶然所得（10�?
            */ 
            case "8":
            case "9":
            case "10":
                D = A * window.personUnexpectedRate;
                E = A * (1 - window.personUnexpectedRate);
                break;
        }



        $("#edTaxSum").val(D.toFixed(2));
        $("#fullSum").val(E.toFixed(2));
    });

});