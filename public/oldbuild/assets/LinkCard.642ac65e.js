import{o as s,c as t,w as d,a,n as i,k as c,t as o,u as k,L as u,f as r,F as m,l as h,j as v}from"./app.af699bdb.js";const g={class:"sb-nav-link-icon"},f={key:1},y=["data-target","aria-controls"],b={class:"sb-nav-link-icon"},L=a("div",{class:"sb-sidenav-collapse-arrow"},[a("i",{class:"fas fa-angle-down"})],-1),w=["id"],$={class:"sb-sidenav-menu-nested nav"},B={__name:"LinkCard",props:{link:Object},setup(e){return(n,C)=>n.$can(e.link.permission)&&!(e.link.children&&e.link.children.length)?(s(),t(k(u),{key:0,class:i("nav-link "+(n.$page.props.route.current.name===e.link.route||e.link.urls&&e.link.urls.some(l=>n.$page.url.includes(l))?"active":"")),href:n.route(e.link.route)},{default:d(()=>[a("div",g,[a("i",{class:i(e.link.icon)},null,2)]),c(" "+o(e.link.name),1)]),_:1},8,["class","href"])):n.$can(e.link.permission)&&e.link.children.length?(s(),r("div",f,[a("a",{class:"nav-link collapsed",href:"#","data-toggle":"collapse","data-target":"#collapseLayoutss"+e.link.name,"aria-expanded":"false","aria-controls":"collapseLayoutss"+e.link.name},[a("div",b,[a("i",{class:i(e.link.icon)},null,2)]),c(" "+o(e.link.name)+" ",1),L],8,y),a("div",{class:i("collapse "+(e.link.children.some(l=>n.$page.props.route.current.name===l.route)?"show":"")),id:"collapseLayoutss"+e.link.name,"aria-labelledby":"headingOne","data-parent":"#sidenavAccordion"},[a("nav",$,[(s(!0),r(m,null,h(e.link.children,l=>(s(),t(B,{link:l,key:l.name},null,8,["link"]))),128))])],10,w)])):v("",!0)}};export{B as _};
