import p from"./AdminLayout.6b400f1c.js";import M from"./Datatable.e67bce07.js";import w from"./editUser.50ebf94a.js";import{_}from"./_plugin-vue_export-helper.cdc0426e.js";import{c as d,w as m,C as t,o as a,b as S,j as r,a as U}from"./app.af699bdb.js";import"./vue-multiselect.esm.19a791f2.js";/* empty css                                                                 */import f from"./deleteUser.13257f09.js";import b from"./addUser.bc577ebc.js";import"./NavBar.37e54ca8.js";import"./Notifications.2ade7db1.js";import"./SideBar.71dc7146.js";import"./LinkCard.642ac65e.js";import"./Footer.2e4b3411.js";import"./Update.1ee14483.js";import"./FilterBtns.bfc6c03a.js";import"./FilterBtns.d5a0a2ee.js";import"./Delete.a38c67ef.js";import"./Add.8704d515.js";const T={components:{AdminLayout:p,Datatable:M,addUser:b,editUser:w,deleteUser:f},props:["datatableUrl","datatableColumns","datatableHeaders"],methods:{ShowEditModel:function(o){this.modelToUpdate=o},ShowShowModel:function(o){this.modelToShow=o},ShowDeleteModel:function(o){this.modelToDelete=o},ShowAddModel:function(){this.modelToAdd=!0},resetModel:function(){this.modelToUpdate=null,this.modelToShow=null,this.modelToDelete=null,this.modelToAdd=null}},data(){return{modelToUpdate:null,modelToShow:null,modelToDelete:null,modelToAdd:null}},computed:{model:function(){return this.modelToUpdate!==null}}},D=U("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Users ",-1);function A(o,C,n,x,l,e){const s=t("Datatable"),i=t("editUser"),u=t("deleteUser"),h=t("addUser"),c=t("AdminLayout");return a(),d(c,{title:"Users"},{header:m(()=>[D]),default:m(()=>[S(s,{onShowAddModel:e.ShowAddModel,onShowDeleteModel:e.ShowDeleteModel,onShowShowModel:e.ShowShowModel,onShowEditModel:e.ShowEditModel,title:"Users table",datatableHeaders:n.datatableHeaders,datatableColumns:n.datatableColumns,datatableUrl:n.datatableUrl},null,8,["onShowAddModel","onShowDeleteModel","onShowShowModel","onShowEditModel","datatableHeaders","datatableColumns","datatableUrl"]),e.model?(a(),d(i,{key:0,onResetModel:e.resetModel,model:l.modelToUpdate},null,8,["onResetModel","model"])):r("",!0),l.modelToDelete!=null?(a(),d(u,{key:1,onResetModel:e.resetModel,model:l.modelToDelete},null,8,["onResetModel","model"])):r("",!0),l.modelToAdd!=null?(a(),d(h,{key:2,onResetModel:e.resetModel},null,8,["onResetModel"])):r("",!0)]),_:1})}const O=_(T,[["render",A]]);export{O as default};
