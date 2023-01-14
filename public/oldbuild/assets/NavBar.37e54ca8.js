import{L as u,p as m,f as e,b as i,w as h,a as o,t as d,F as g,l as f,k as c,m as v,C as l,o as n}from"./app.af699bdb.js";import b from"./Notifications.2ade7db1.js";import{_ as w}from"./_plugin-vue_export-helper.cdc0426e.js";const k={components:{Notifications:b,Link:u},methods:{logout:function(){m.Inertia.post(route("admin.logout"),{},{})}}},y={class:"sb-topnav navbar navbar-expand navbar-light bg-white shadow-sm"},$=["src"],L=o("button",{class:"btn btn-link btn-sm order-1 order-lg-0",id:"sidebarToggle",href:"#"},[o("i",{class:"fas fa-bars"})],-1),N=o("form",{class:"d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"},null,-1),x={class:"navbar-nav ml-auto ml-md-0"},B={class:"nav-item dropdown no-arrow ml-1 osahan-profile-dropdown"},C={class:"nav-link dropdown-toggle pr-0",href:"#",role:"button","data-toggle":"dropdown","aria-haspopup":"true","aria-expanded":"false"},V=["src"],F={class:"dropdown-menu dropdown-menu-right shadow-sm"},M={class:"p-3 d-flex align-items-center"},S={class:"dropdown-list-image mr-3"},T=["src"],A=o("div",{class:"status-indicator bg-success"},null,-1),D={class:"font-weight-bold"},E={class:"text-truncate"},I={class:"small text-gray-500"},j=o("div",{class:"dropdown-divider"},null,-1),q=["href"],z=o("i",{class:"feather-edit"},null,-1),G=o("div",{class:"dropdown-divider"},null,-1),H=o("button",{class:"dropdown-item",type:"submit"},[o("i",{class:"feather-log-out"}),c(" Logout")],-1),J=[H];function K(s,a,O,P,Q,r){const p=l("Link"),_=l("notifications");return n(),e("nav",y,[i(p,{class:"navbar-brand",href:s.route("admin.index")},{default:h(()=>[o("img",{alt:"logo",style:{width:"40%",height:"3vw"},src:s.$page.props.logo},null,8,$)]),_:1},8,["href"]),L,N,o("ul",x,[i(_),o("li",B,[o("a",C,[o("img",{class:"img-profile rounded-circle",src:s.$page.props.user.profile_photo_url},null,8,V)]),o("div",F,[o("div",M,[o("div",S,[o("img",{class:"rounded-circle",src:s.$page.props.user.profile_photo_url,alt:""},null,8,T),A]),o("div",D,[o("div",E,d(s.$page.props.auth.name),1),o("div",I,[o("h6",null,[(n(!0),e(g,null,f(s.$page.props.auth.roles,t=>(n(),e("span",{key:t,class:"badge badge-success"},d(t),1))),128))])])])]),j,o("a",{class:"dropdown-item",href:s.route("profile.show")},[z,c(" My Account")],8,q),G,o("form",{onSubmit:a[0]||(a[0]=v((...t)=>r.logout&&r.logout(...t),["prevent"]))},J,32)])])])])}const X=w(k,[["render",K]]);export{X as default};
