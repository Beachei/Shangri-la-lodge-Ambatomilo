document.addEventListener("DOMContentLoaded", function(){
    const a = document.querySelectorAll('.a');
    const b = document.querySelectorAll('.b');
    const c = document.querySelectorAll('.c');
    const d = document.querySelectorAll('.d');
    const e = document.querySelectorAll('.e');
    const f = document.querySelectorAll('.f');
    const g = document.querySelectorAll('.g');
    const h = document.querySelectorAll('.h');
    const i = document.querySelectorAll('.i');
    const j = document.querySelectorAll('.j');
    const l = document.querySelectorAll('.l');
    const m = document.querySelectorAll('.m');
    const n = document.querySelectorAll('.n');
    const o = document.querySelectorAll('.o');
    const p = document.querySelectorAll('.p');
    const q = document.querySelectorAll('.q');
    const r = document.querySelectorAll('.r');
    const s = document.querySelectorAll('.s');
    const t = document.querySelectorAll('.t');
    const u = document.querySelectorAll('.u');
    const v = document.querySelectorAll('.v');
    const w = document.querySelectorAll('.w');
    const x = document.querySelectorAll('.x1');
    const y = document.querySelectorAll('.y');
    const z = document.querySelectorAll('.z');
    const z1 = document.querySelectorAll('.z1');
    const z2 = document.querySelectorAll('.z2');
    const animScroll = document.querySelectorAll('.animScroll');
    const animScroll1 = document.querySelectorAll('.animScroll1');
    let timer = 0;
    let timer1 = 0;
     function minuteur(){
        timer += 0.5;
        if(timer == 37){
            timer = 1
        }
        switch (timer){
            case 2:
                a.forEach(function(a1){
                    a1.classList.add("aScale")
                })
                break
            case 5 :
                a.forEach(function(a2){
                    a2.classList.remove("aScale")
                })
                b.forEach(function(b1){
                    b1.classList.add("aScale")
                })
                break
            case 8 :
                b.forEach(function(b2){
                    b2.classList.remove("aScale")
                })
                c.forEach(function(c1){
                    c1.classList.add("aScale")
                })
                break
            case 11:
                c.forEach(function(c2){
                    c2.classList.remove("aScale")
                }) 
                d.forEach(function(d1){
                    d1.classList.add("aScale")
                })
                break
            case 14:
                d.forEach(function(d2){
                    d2.classList.remove("aScale")
                })
                e.forEach(function(e1){
                    e1.classList.add("aScale")
                })
                break
            case 17:
                e.forEach(function(e2){
                    e2.classList.remove("aScale")
                })
                f.forEach(function(f1){
                    f1.classList.add("aScale")
                })
                break
            case 20:
                f.forEach(function(f2){
                    f2.classList.remove("aScale")
                })
                g.forEach(function(g1){
                    g1.classList.add("aScale")
                })
                break
            case 23:
                g.forEach(function(g2){
                    g2.classList.remove("aScale")
                })
                h.forEach(function(h1){
                    h1.classList.add("aScale")
                })
                break
            case 26:
                h.forEach(function(h2){
                    h2.classList.remove("aScale")
                })
                i.forEach(function(i1){
                    i1.classList.add("aScale")
                })
                break
            case 29:
                i.forEach(function(i2){
                    i2.classList.remove("aScale")
                })
                j.forEach(function(j1){
                    j1.classList.add("aScale")
                })
                break
            case 32:
                j.forEach(function(j2){
                    j2.classList.remove("aScale")
                })
                break
        }
    }
    setTimeout(() => {
        animScroll.forEach(function(anim){
            anim.classList.add('cna');
        })
    }, 2000);
        setInterval(minuteur,500); 
    function minuteur1(){
        timer1++
        if(timer1 == 55){
            timer1 = 1
        }
        switch (timer1){
            case 2:
                l.forEach(function(l1){
                    l1.classList.add("aScale")
                })
                break
            case 5 :
                l.forEach(function(l2){
                    l2.classList.remove("aScale")
                })
                m.forEach(function(m1){
                    m1.classList.add("aScale")
                })
                break
            case 8 :
                m.forEach(function(m2){
                    m2.classList.remove("aScale")
                })
                n.forEach(function(n1){
                    n1.classList.add("aScale")
                })
                break
            case 11: 
                n.forEach(function(n2){
                  n2.classList.remove("aScale")
                })
                o.forEach(function(o1){
                  o1.classList.add("aScale")
                })
                break
            case 14:
                o.forEach(function(o2){
                   o2.classList.remove("aScale")
                })
                p.forEach(function(p1){
                   p1.classList.add("aScale")
                })
                break
            case 17:
                p.forEach(function(p2){
                    p2.classList.remove("aScale")
                })
                q.forEach(function(q1){
                    q1.classList.add("aScale")
                })
                break
            case 20:
                q.forEach(function(q2){
                    q2.classList.remove("aScale")
                })
                r.forEach(function(r1){
                    r1.classList.add("aScale")
                })
                break
            case 23:
                r.forEach(function(r2){
                    r2.classList.remove("aScale")
                })
                s.forEach(function(s1){
                    s1.classList.add("aScale")
                })
                break
            case 26:
                s.forEach(function(s2){
                    s2.classList.remove("aScale")
                })
                t.forEach(function(t1){
                    t1.classList.add("aScale")
                })
                break
            case 29:
                t.forEach(function(t2){
                    t2.classList.remove("aScale")
                })
                u.forEach(function(u1){
                    u1.classList.add("aScale")
                })
                break
            case 35:
                u.forEach(function(u2){
                    u2.classList.remove("aScale")
                })
                v.forEach(function(v1){
                    v1.classList.add("aScale")
                })
                break
            case 38:
                v.forEach(function(v2){
                    v2.classList.remove("aScale")
                })
                w.forEach(function(w1){
                    w1.classList.add("aScale")
                })
                break
            case 41:
                w.forEach(function(w2){
                    w2.classList.remove("aScale")
                })
                x.forEach(function(x1){
                    x1.classList.add("aScale");
                })
                break
            case 44:
                x.forEach(function(x2){
                    x2.classList.remove("aScale");
                })
                y.forEach(function(y1){
                    y1.classList.add("aScale")
                })
                break
            case 47:
                y.forEach(function(y2){
                    y2.classList.remove("aScale")
                })
                z.forEach(function(z1){
                    z1.classList.add("aScale")
                })
                break
            case 50:
                z.forEach(function(z2){
                    z2.classList.remove("aScale")
                })
                z1.forEach(function(z11){
                    z11.classList.add("aScale")
                })
                break
            case 53:
                z1.forEach(function(z12){
                    z12.classList.remove("aScale")
                })
                break
        }
        console.log(timer1);
    }
    setTimeout(() => {
        animScroll1.forEach(function(anim1){
            anim1.classList.add('cna1')
        })
    }, 2000);
      setInterval(minuteur1, 1000);
      animScroll.forEach(function(aner){
       var position =  aner.getBoundingClientRect().left
        console.log("x position parent" + position)
      })

        a.forEach(function(a2){
            console.log()
            var position = a2.getBoundingClientRect().x;
            if(position == 12){
                console.log("METY B TY RAY TY" )
            }
            console.log(position)
          })





     var ng = 100/12;
     var ng1 = ng*2;
     var ng2 = ng1 +ng;
     var ng3 = ng2 +ng;
     var ng4 = ng3 +ng;
     var ng5 = ng4 +ng;
     var ng6 = ng5 +ng;
     var ng7 = ng6 +ng;
     var ng8 = ng7 +ng;
     var ng9 = ng8 +ng;
     var ng10 = ng9 +ng;

     console.log(ng, ng1, ng2, ng3, ng4, ng5, ng6, ng7,ng8, ng9,ng10)
})