import{p as d,f as s,j as i,F as c,o,a as n,k as u}from"./app.af699bdb.js";import{_ as m}from"./_plugin-vue_export-helper.cdc0426e.js";const f={methods:{submit:function(t){let e={};t&&(e={for:t}),d.Inertia.visit(route("admin.client.index",e))},showMe:function(t){let l=window.location.href.split("?")[1];return t?l!=="for="+t:l!=null}}},_=n("h6",null,[n("i",{class:"feather-user"}),u(" Unordered")],-1),h=[_],b=n("h6",null,[n("i",{class:"feather-user-minus"}),u(" Unregistered")],-1),k=[b],w=n("h6",null,[n("i",{class:"feather-user-check"}),u(" All")],-1),g=[w];function p(t,e,l,x,v,r){return o(),s(c,null,[r.showMe("unordered")?(o(),s("button",{key:0,onClick:e[0]||(e[0]=a=>r.submit("unordered")),class:"mr-1 btn btn-warning"},h)):i("",!0),r.showMe("unregistered")?(o(),s("button",{key:1,onClick:e[1]||(e[1]=a=>r.submit("unregistered")),class:"mr-1 btn btn-dark"},k)):i("",!0),r.showMe(null)?(o(),s("button",{key:2,onClick:e[2]||(e[2]=a=>r.submit()),class:"mr-1 btn btn-light"},g)):i("",!0)],64)}const M=m(f,[["render",p]]);export{M as default};