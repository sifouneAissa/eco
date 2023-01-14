import{h as w,g as y,c as $,w as r,o as l,k as n,t as e,a as s,f as i,F as b,l as x,j as C,b as c,u as d,P as B,n as V}from"./app.af699bdb.js";import{_ as M}from"./ActionMessage.f25c83be.js";import{a as L,b as S}from"./DialogModal.2a6fb390.js";import{_ as F,a as N}from"./TextInput.b6356004.js";import{_ as g}from"./PrimaryButton.53fd8893.js";import{_ as j}from"./SecondaryButton.addb0e31.js";import"./SectionTitle.0a4f5585.js";import"./_plugin-vue_export-helper.cdc0426e.js";const z={class:"max-w-xl text-sm text-gray-600"},K={key:0,class:"mt-5 space-y-6"},T={key:0,fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",stroke:"currentColor",class:"w-8 h-8 text-gray-500"},U=s("path",{d:"M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"},null,-1),E=[U],H={key:1,xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24","stroke-width":"2",stroke:"currentColor",fill:"none","stroke-linecap":"round","stroke-linejoin":"round",class:"w-8 h-8 text-gray-500"},I=s("path",{d:"M0 0h24v24H0z",stroke:"none"},null,-1),O=s("rect",{x:"7",y:"4",width:"10",height:"16",rx:"1"},null,-1),A=s("path",{d:"M11 5h2M12 17v.01"},null,-1),D=[I,O,A],P={class:"ml-3"},q={class:"text-sm text-gray-600"},G={class:"text-xs text-gray-500"},J={key:0,class:"text-green-500 font-semibold"},Q={key:1},R={class:"flex items-center mt-5"},W={class:"mt-4"},ae={__name:"LogoutOtherBrowserSessionsForm",props:{sessions:Array},setup(m){const u=w(!1),_=w(null),a=y({password:""}),v=()=>{u.value=!0,setTimeout(()=>_.value.focus(),250)},f=()=>{a.delete(route("other-browser-sessions.destroy"),{preserveScroll:!0,onSuccess:()=>p(),onError:()=>_.value.focus(),onFinish:()=>a.reset()})},p=()=>{u.value=!1,a.reset()};return(o,h)=>(l(),$(L,null,{title:r(()=>[n(e(o.$t("profile.browser.title")),1)]),description:r(()=>[n(e(o.$t("profile.browser.description")),1)]),content:r(()=>[s("div",z,e(o.$t("profile.browser.card_content")),1),m.sessions.length>0?(l(),i("div",K,[(l(!0),i(b,null,x(m.sessions,(t,k)=>(l(),i("div",{key:k,class:"flex items-center"},[s("div",null,[t.agent.is_desktop?(l(),i("svg",T,E)):(l(),i("svg",H,D))]),s("div",P,[s("div",q,e(t.agent.platform?t.agent.platform:"Unknown")+" - "+e(t.agent.browser?t.agent.browser:"Unknown"),1),s("div",null,[s("div",G,[n(e(t.ip_address)+", ",1),t.is_current_device?(l(),i("span",J,"This device")):(l(),i("span",Q,"Last active "+e(t.last_active),1))])])])]))),128))])):C("",!0),s("div",R,[c(g,{onClick:v},{default:r(()=>[n(e(o.$t("profile.browser.log_out")),1)]),_:1}),c(M,{on:d(a).recentlySuccessful,class:"ml-3"},{default:r(()=>[n(e(o.$t("profile.done")),1)]),_:1},8,["on"])]),c(S,{show:u.value,onClose:p},{title:r(()=>[n(e(o.$t("profile.browser.log_out")),1)]),content:r(()=>[n(e(o.$t("profile.browser.msg"))+" ",1),s("div",W,[c(F,{ref_key:"passwordInput",ref:_,modelValue:d(a).password,"onUpdate:modelValue":h[0]||(h[0]=t=>d(a).password=t),type:"password",class:"mt-1 block w-3/4",placeholder:o.$t("profile.password.current_password"),onKeyup:B(f,["enter"])},null,8,["modelValue","placeholder","onKeyup"]),c(N,{message:d(a).errors.password,class:"mt-2"},null,8,["message"])])]),footer:r(()=>[c(j,{onClick:p},{default:r(()=>[n(e(o.$t("profile.cancel")),1)]),_:1}),c(g,{class:V(["ml-3",{"opacity-25":d(a).processing}]),disabled:d(a).processing,onClick:f},{default:r(()=>[n(e(o.$t("profile.browser.log_out")),1)]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{ae as default};
