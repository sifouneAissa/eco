import w from"./AdminLayout.6b400f1c.js";import p from"./Datatable.e67bce07.js";import S from"./editUser.c164c296.js";import{_ as M}from"./_plugin-vue_export-helper.cdc0426e.js";import{p as _,c as d,w as s,C as t,o as a,b as f,j as r,a as U}from"./app.af699bdb.js";import"./vue-multiselect.esm.19a791f2.js";/* empty css                                                                 */import b from"./deleteUser.2fee64cf.js";import T from"./addUser.0af3d592.js";import C from"./FilterBtns.bfc6c03a.js";import"./NavBar.37e54ca8.js";import"./Notifications.2ade7db1.js";import"./SideBar.71dc7146.js";import"./LinkCard.642ac65e.js";import"./Footer.2e4b3411.js";import"./Update.1ee14483.js";import"./FilterBtns.d5a0a2ee.js";import"./Delete.a38c67ef.js";import"./Add.8704d515.js";const D={components:{AdminLayout:w,Datatable:p,addUser:T,editUser:S,deleteUser:b,FilterBtns:C},props:["datatableUrl","datatableColumns","datatableHeaders"],methods:{ShowEditModel:function(o){this.modelToUpdate=o},ShowShowModel:function(o){this.modelToShow=o},ShowDeleteModel:function(o){this.modelToDelete=o},ShowAddModel:function(){this.modelToAdd=!0},resetModel:function(){this.modelToUpdate=null,this.modelToShow=null,this.modelToDelete=null,this.modelToAdd=null},ShowOrdersPage:function(o){_.Inertia.visit(o.route)}},data(){return{modelToUpdate:null,modelToShow:null,modelToDelete:null,modelToAdd:null}},computed:{model:function(){return this.modelToUpdate!==null}}},A=U("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Users ",-1);function g(o,x,n,y,l,e){const m=t("Datatable"),i=t("editUser"),h=t("deleteUser"),u=t("addUser"),c=t("AdminLayout");return a(),d(c,{title:"Clients"},{header:s(()=>[A]),default:s(()=>[f(m,{Btns:"ClientFilterBtns",onShowOrdersPage:e.ShowOrdersPage,onShowAddModel:e.ShowAddModel,onShowDeleteModel:e.ShowDeleteModel,onShowShowModel:e.ShowShowModel,onShowEditModel:e.ShowEditModel,title:"Clients table",datatableHeaders:n.datatableHeaders,datatableColumns:n.datatableColumns,datatableUrl:n.datatableUrl},null,8,["onShowOrdersPage","onShowAddModel","onShowDeleteModel","onShowShowModel","onShowEditModel","datatableHeaders","datatableColumns","datatableUrl"]),e.model?(a(),d(i,{key:0,onResetModel:e.resetModel,model:l.modelToUpdate},null,8,["onResetModel","model"])):r("",!0),l.modelToDelete!=null?(a(),d(h,{key:1,onResetModel:e.resetModel,model:l.modelToDelete},null,8,["onResetModel","model"])):r("",!0),l.modelToAdd!=null?(a(),d(u,{key:2,onResetModel:e.resetModel},null,8,["onResetModel"])):r("",!0)]),_:1})}const Q=M(D,[["render",g]]);export{Q as default};