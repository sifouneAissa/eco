import{g as m,f as _,b as c,u as e,a as s,t as r,m as u,e as l,D as n,q as d,w as g,o as h,H as f,k as w,L as b}from"./app.af699bdb.js";const v={class:"container-fluid",style:{"background-color":"white"}},$={class:"row no-gutter"},y={class:"d-none d-md-flex col-md-4 col-lg-6 bg-image"},V=["src"],k={class:"col-md-8 col-lg-6"},N={class:"login d-flex align-items-center py-5"},S={class:"container"},x={class:"row"},P={class:"col-md-9 col-lg-8 mx-auto pl-5 pr-5"},U={class:"login-heading mb-4"},B=["onSubmit"],C={class:"form-label-group"},D=["placeholder"],E={for:"inputName"},F={class:"text-sm",style:{color:"red"}},H={class:"form-label-group"},L=["placeholder"],M={for:"inputEmail"},T={class:"text-sm text-red-600",style:{color:"red"}},q={class:"form-label-group"},R=["placeholder"],j={for:"inputPassword"},z={class:"text-sm text-red-600",style:{color:"red"}},A={class:"form-label-group"},G=["placeholder"],I={for:"inputPasswordCofirmation"},J={class:"text-sm text-red-600"},K={type:"submit",class:"btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2"},O={class:"text-center pt-3"},X={__name:"Register",setup(Q){const o=m({name:"",email:"",password:"",password_confirmation:"",terms:!1}),p=()=>{o.post(route("register"),{onFinish:()=>o.reset("password","password_confirmation"),onSuccess:()=>window.location.reload()})};return(t,i)=>(h(),_("div",v,[c(e(f),{title:t.$t("register.welcome")},null,8,["title"]),s("div",$,[s("div",y,[s("img",{class:"img-fluid",src:t.$page.props.register_image},null,8,V)]),s("div",k,[s("div",N,[s("div",S,[s("div",x,[s("div",P,[s("h3",U,r(t.$t("register.welcome"))+" !",1),s("form",{onSubmit:u(p,["prevent"])},[s("div",C,[l(s("input",{"onUpdate:modelValue":i[0]||(i[0]=a=>e(o).name=a),type:"text",id:"inputName",class:"form-control",placeholder:t.$t("register.name")},null,8,D),[[n,e(o).name]]),s("label",E,r(t.$t("register.name")),1),l(s("div",null,[s("p",F,r(e(o).errors.name),1)],512),[[d,e(o).errors.name]])]),s("div",H,[l(s("input",{"onUpdate:modelValue":i[1]||(i[1]=a=>e(o).email=a),type:"email",id:"inputEmail",class:"form-control",placeholder:t.$t("register.email")},null,8,L),[[n,e(o).email]]),s("label",M,r(t.$t("register.email")),1),l(s("div",null,[s("p",T,r(e(o).errors.email),1)],512),[[d,e(o).errors.email]])]),s("div",q,[l(s("input",{"onUpdate:modelValue":i[2]||(i[2]=a=>e(o).password=a),type:"password",id:"inputPassword",class:"form-control",placeholder:t.$t("register.password")},null,8,R),[[n,e(o).password]]),s("label",j,r(t.$t("register.password")),1),l(s("div",null,[s("p",z,r(e(o).errors.password),1)],512),[[d,e(o).errors.password]])]),s("div",A,[l(s("input",{"onUpdate:modelValue":i[3]||(i[3]=a=>e(o).password_confirmation=a),type:"password",id:"inputPasswordCofirmation",class:"form-control",placeholder:t.$t("register.password_confirmation")},null,8,G),[[n,e(o).password_confirmation]]),s("label",I,r(t.$t("register.password_confirmation")),1),l(s("div",null,[s("p",J,r(e(o).errors.password_confirmation),1)],512),[[d,e(o).errors.password_confirmation]])]),s("button",K,r(t.$t("register.sign_up")),1),s("div",O,[c(e(b),{href:t.route("login")},{default:g(()=>[w(r(t.$t("login.login")),1)]),_:1},8,["href"])])],40,B)])])])])])])]))}};export{X as default};