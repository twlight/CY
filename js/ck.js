

(function() {
    var b = 0,
    c, a, q, p, o, l, k, d, r, g, j, u;
    a = q = p = o = l = k = d = r = g = j = u = 0;
    function s(w) {
        var i = window.event || w;
        u = i.target || i.srcElement;
        while (u && u.tagName != "A") {
            u = u.parentNode
        }
        r = new Date().getTime();
        a = 9999;
        q = i.clientX;
        p = i.clientY;
        if (!g) {
            k = 0
        } else {
            k = r - g
        }
        if (v()) {
            n()
        }
    }
    function e() {
        j = new Date().getTime();
        a = j - r;
        if (v()) {
            n()
        }
    }
    function h(w) {
        var i = window.event || w;
        b += 1;
        if (!o) {
            o = i.clientX
        }
        if (!l) {
            l = i.clientY
        }
        g = new Date().getTime()
    }
    function v() {
        c = 0;
        if (d = /link\?url\=([^\&]+)/.exec(u.href)) {
            for (var x = 0; x < (((b * ImTimeSign) % 99) + 9); ++x) {
                var w = d[1].length < 20 ? d[1].length: 20;
                c += d[1].charCodeAt((a * x) % w)
            }
            return true
        } else {
            if (d = /\?url\=([^\.]+)\./.exec(u.href)) {
                for (var x = 0; x < (((b * ImTimeSign) % 99) + 9); ++x) {
                    c += d[1].charCodeAt((a * x) % d[1].length)
                }
                return true
            }
        }
        return false;
    }
    function n() {
        var w = "&ck=" + [c, b, a, q, p, o, l, k].join(".");
        if (u.href) {
            var i = u.href;
            if (i.indexOf("&ck=") == -1) {
                u.href += w
            } else {
                u.href = i.replace(/&ck=[\w.]*/, w)
            }
        }
    }
    function m(z, y, x) {
        for (var w in y) {
            if (window.attachEvent) {
                z.attachEvent("on" + y[w], x[w])
            } else {
                z.addEventListener(y[w], x[w], false)
            }
        }
    }
    var f = document.getElementsByTagName("a");
    for (var t = 0; t < f.length; t++) {
        if (f[t].parentNode.className.search(/\bEC_PP\b/) != -1) {
            m(f[t], ["mouseover", "mousedown", "mouseup"], [function(i) {
                h(i)
            },
            function(i) {
                s(i)
            },
            function() {
                e()
            }])
        }
    }
})(); 



(function() {
    function s(o) {
        if (document.getElementsByClassName) {
            return document.getElementsByClassName(o)
        } else {
            var q = document.getElementsByTagName("*");
            var w = [];
            for (var m = 0; m < q.length; m++) {
                var v = q[m].className.split(" ");
                for (var j = 0; j < v.length; j++) {
                    if (v[j] == o) {
                        w[w.length] = q[m]
                    }
                }
            }
            return w
        }
    }
    function p() {
        if (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.split(";")[1].replace(/[ ]/g, "") == "MSIE6.0") {
            return "IE6"
        } else {
            if (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.split(";")[1].replace(/[ ]/g, "") == "MSIE7.0") {
                return "IE7"
            } else {
                if (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.split(";")[1].replace(/[ ]/g, "") == "MSIE8.0") {
                    return "IE8"
                }
            }
        }
    }
    function n(x) {
        var i = navigator.userAgent.toLowerCase();
        var j = (i.indexOf("opera") != -1);
        var q = (i.indexOf("msie") != -1 && !j);
        var o = x;
        if (o.parentNode === null || o.style.display == "none") {
            return false
        }
        var B = null;
        var A = [];
        var y;
        if (o.getBoundingClientRect) {
            y = o.getBoundingClientRect();
            var m = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
            var v = Math.max(document.documentElement.scrollLeft, document.body.scrollLeft);
            return {
                x: y.left + v,
                y: y.top + m
            }
        } else {
            if (document.getBoxObjectFor) {
                y = document.getBoxObjectFor(o);
                var z = (o.style.borderLeftWidth) ? parseInt(o.style.borderLeftWidth) : 0;
                var w = (o.style.borderTopWidth) ? parseInt(o.style.borderTopWidth) : 0;
                A = [y.x - z, y.y - w]
            } else {
                A = [o.offsetLeft, o.offsetTop];
                B = o.offsetParent;
                if (B != o) {
                    while (B) {
                        A[0] += B.offsetLeft;
                        A[1] += B.offsetTop;
                        B = B.offsetParent
                    }
                }
                if (i.indexOf("opera") != -1 || (i.indexOf("safari") != -1 && o.style.position == "absolute")) {
                    A[0] -= document.body.offsetLeft;
                    A[1] -= document.body.offsetTop
                }
            }
        }
        if (o.parentNode) {
            B = o.parentNode
        } else {
            B = null
        }
        while (B && B.tagName != "BODY" && B.tagName != "HTML") {
            ancestors;
            A[0] -= B.scrollLeft;
            A[1] -= B.scrollTop;
            if (B.parentNode) {
                B = B.parentNode
            } else {
                B = null
            }
        }
        return {
            x: A[0],
            y: A[1]
        }
    }
    var g = d = null;
    var h = 50;
    function a(o, m) {
        clearTimeout(d);
        var j = o;
        var i = p();
        if (i == "IE6") {
            var q = m.offsetHeight
        } else {
            if (i == "IE7") {
                var q = m.offsetHeight + 8
            } else {
                if (i == "IE8") {
                    var q = m.offsetHeight + 9
                } else {
                    var q = m.offsetHeight + 10
                }
            }
        }
        j.style.top = parseInt(n(m).y) + q + "px";
        j.style.left = parseInt(n(m).x) - 5 + "px";
        j.style.display = "block";
        if (j) {
            j.onmouseover = function() {
                clearTimeout(d);
                j.style.display = "block"
            };
            j.onmouseout = function() {
                clearTimeout(g);
                d = setTimeout(function() {
                    j.style.display = "none"
                },
                h)
            };
            g = setTimeout(function() {
                j.style.display = "block"
            },
            h)
        }
    }
    function c(j, i) {
        clearTimeout(g);
        var m = j;
        if (m) {
            d = setTimeout(function() {
                m.style.display = "none"
            },
            h)
        }
    }
    function r(j, i) {
        ecTipPos = j;
        j.style.display = i
    }
    var k = s("ec_pp_f");
    var e = s("EC_tip");
    function u(o, j, i) {
        var m = i;
        m = function(q) {
            i.call(o, q)
        };
        if (o.attachEvent) {
            o.attachEvent("on" + j, m)
        } else {
            if (o.addEventListener) {
                o.addEventListener(j, m, false)
            } else {
                o["on" + j] = m
            }
        }
    }
    for (var d = 0; d < k.length; d++) {
        u(k[d], "mouseover", t);
        u(k[d], "mouseout", b)
    }
    for (var f = 0; f < e.length; f++) {
        u(e[f], "mouseout", l)
    }
    function l() {
        var i = this;
        r(i, "none")
    }
    function t(x) {
        var v = this;
        var x = x || window.event;
        var q = x.target || x.srcElement;
        var o = q.getAttribute("data-tip");
        if (o) {
            for (var j = 0; j < e.length; j++) {
                r(e[j], "none")
            }
            var i = q;
            var m = v.getElementsByTagName("*");
            for (var z = 0; z < m.length; z++) {
                var w = m[z].className;
                w = w.split(" ");
                for (var y = 0; y < w.length; y++) {
                    if (w[y] == o) {
                        a(m[z], i)
                    }
                }
            }
        }
    }
    function b(j) {
        var w = this;
        var j = j || window.event;
        evtSrcElement = j.target || j.srcElement;
        var i = evtSrcElement.getAttribute("data-tip");
        if (i) {
            var o = evtSrcElement;
            var x = w.getElementsByTagName("*");
            for (var q = 0; q < x.length; q++) {
                var m = x[q].className;
                m = m.split(" ");
                for (var v = 0; v < m.length; v++) {
                    if (m[v] == i) {
                        c(x[q], o)
                    }
                }
            }
        }
    }
})(); 

(function(h, g) {
    function c(l) {
        if (document.getElementsByClassName) {
            return document.getElementsByClassName(l)
        } else {
            var m = document.getElementsByTagName("*");
            var o = [];
            for (var k = 0; k < m.length; k++) {
                var n = m[k].className.split(" ");
                for (var j = 0; j < n.length; j++) {
                    if (n[j] == l) {
                        o[o.length] = m[k]
                    }
                }
            }
            return o
        }
    }
    function f(l, j, i) {
        var k = i;
        k = function(m) {
            i.call(l, m)
        };
        if (l.attachEvent) {
            l.attachEvent("on" + j, k)
        } else {
            if (l.addEventListener) {
                l.addEventListener(j, k, false)
            } else {
                l["on" + j] = k
            }
        }
    }
    var b = c("ec_pp_f");
    var a = null;
    for (var d = 0; d < b.length; d++) {
        f(b[d], "mouseover", e)
    }
    function e(j) {
        var n = this;
        var j = j || window.event;
        var p = j.target || j.srcElement;
        var k = p.getAttribute("data-rcv");
        if (k) {
            var l = p;
            a = l.getAttribute("href");
            if (a.indexOf("url") != -1) {
                return false
            }
            var o = (a.indexOf("?") != -1) ? "&": "?";
            var m = o + "url=" + k;
            var i = a + m;
            l.setAttribute("href", i)
        }
    }
})(window, document);