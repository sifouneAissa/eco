const ar = {
    nav_menu:{
        help:{
           help:"مساعدة",
           contact_us:"اتصل بنا",
           about_us:"معلومات عنا",
           faq:"أسئلة وأجوبة",
           privacy_policy:"سياسة الخصوصية",
           terms_conditions:"الأحكام والشروط",
           shipping_policy:"سياسة الإرجاع والشحن",
        },
        pages:{
           pages:"الصفحات",
           login:"تسجيل الدخول",
           register:" التسجيل" ,
           home:"الصفحة الرئيسية",
           logout:"تسجيل خروج",
           profile:"الملف الشخصي",
           account:"حسابي",
           products:"المنتجات",
           new:"جديد",
        }
       },
    locales : {
        ar : 'العربية',
        en : 'الانجلزية',
        fr : 'الفرنسية'
    },
    currencies : {
        dzd : 'الدينار',
        euro : 'الأورو',
        dollar : 'الدولار'
    },
    dashboard : "اللصفحة الرئيسية",
    login : {
        welcome : 'مرحبا',
        email : 'البريد الالكتروني',
        password : 'كلمة السر',
        login : 'تسجيل الدخول',
        register : 'تسجيل',
        remember_me : 'تدكرني'
    },
    register : {
        welcome : 'مرحبا',
        name : 'الإسم ',
        email : 'البريد الالكتروني',
        password : 'كلمة السر',
        password_confirmation : 'تأكيد كلمة السر',
        sign_up : 'تسجيل',
    },
    account:{
        account:"حسابي",
        edit_button:"تعديل",
        menu:{
            orders:"الطلبات",
            offers:"العروض",
            favourites:"المفضلة",
            payments:"المدفوعات",
            addresses:"العناوين",
        },
        orders:{
            past_orders:"الطلبات السابقة"
        },
        offers:{
        },
        favourites:{
        },
        payments:{
        },
        addresses:{
            manage_addresses:"إدارة العناوين",
            add_button:"إضافة  ",
            add_card:{
                title:"أضف عنوان شحن",
                address1:"العنوان الأول",
                address2:"العنوان الثاني",
                city:"المدينة",
                country:"البلد",
                mobile:"التليفون المحمول",
                telephone:"الهاتف",
                postal_code:"الرقم البريدي",
                cancel:"إلغاء",
                save:"حفظ",
            },
            edit_card:{
                title:"تعديل عنوان الشحن",
                edit:"تعديل",
            },
            delete_card:{
                title:"حذف",
                content:" هل أنت متأكد أنك تريد حذف هذا العنوان" ,
                delete:"حذف",
            }

        },
    },
    profile:{
        page_title:"الملف الشخصي",
        save:"حفظ",
        cancel:"إلغاء",
        saved:"سجل ",
        done:"منجز",
        disable:"توقيف ",
        confirm:"تأكيد",
        info:{
            title:"معلومات الملف الشخصي",
            description:"قم بتحديث معلومات الملف الشخصي لحسابك وعنوان البريد الإلكتروني. ",
            photo:"الصورة ",
            select_photo:"حدد صورة جديدة",
            name:"الإسم",
            email:"البريد الالكتروني",
            remove_photo:"إزالة الصورة",
            msg1:" لم يتم التحقق من عنوان بريدك الإلكتروني.",
            msg2:" انقر هنا لإعادة إرسال رسالة التحقق.",
            msg3:"تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.",
        },
        password:{
            title:"تغيير كلمة المرور",
            description:"تأكد من أن حسابك يستخدم كلمة مرور طويلة وعشوائية للبقاء آمنًا.",
            current_password:"كلمة المرور الحالية",
            new_password:"كلمة السر الجديدة",
            password_confirmation:"تأكيد كلمة المرور",
        },
        two_factor_authentication:{
            title:" توثيق ذو عاملين",
            description:"أضف أمانًا إضافيًا إلى حسابك باستخدام المصادقة الثنائية.",
            card_title:"لم تقم بتمكين المصادقة الثنائية. ",
            card_content:"عند تمكين المصادقة الثنائية ، ستتم مطالبتك برمز مميز آمن وعشوائي أثناء المصادقة. يمكنك استرداد هذا الرمز المميز من تطبيق Google Authenticator بهاتفك.",
            enable:"نشط",
        },
        browser:{
            title:" جلسات المتصفح",
            description:"إدارة جلساتك النشطة وتسجيل الخروج منها على متصفحات وأجهزة أخرى.",
            card_content:"إذا لزم الأمر ، يمكنك تسجيل الخروج من جميع جلسات المتصفح الأخرى عبر جميع أجهزتك. بعض جلساتك الأخيرة مذكورة أدناه ؛ ومع ذلك ، قد لا تكون هذه القائمة شاملة. إذا شعرت أنه تم اختراق حسابك ، يجب عليك أيضًا تحديث كلمة المرور الخاصة بك. ",
            log_out:" تسجيل الخروج جلسات المتصفح الأخرى",
            msg:"يرجى إدخال كلمة المرور الخاصة بك لتأكيد رغبتك في تسجيل الخروج من جلسات المتصفح الأخرى عبر جميع أجهزتك."
        },
        delete_account:{
            title:" حذف الحساب ",
            description:"احذف حسابك بشكل دائم.",
            card_content:"بمجرد حذف حسابك ، سيتم حذف جميع موارده وبياناته نهائيًا. قبل حذف حسابك ، يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها. ",
            delete:"  حذف الحساب  ",
            card_delete_content:" هل انت متأكد انك تريد حذف حسابك؟ بمجرد حذف حسابك ، سيتم حذف جميع موارده وبياناته نهائيًا. الرجاء إدخال كلمة المرور الخاصة بك لتأكيد رغبتك في حذف حسابك بشكل دائم."

        },
    },
    track_order:{
        order:"الطلب ",
        help:"مساعدة",
        items:"العناصر",
        details:"تفاصيل الطلب",
        from:"من",
        other:"أخرى",
        deliver_to:"التوصيل إلى",
        total_bill:"إجمالي الفاتورة",
        paid_via:"دفع عن طريق",
        off:"الخصومات",
        order_received:"تم استلام الطلب",
        order_confirmed:"تم تاكيد الطلب",
        order_picked_up:"تم استرداد الطلب",
        now:"حاليا",
        checked:"تم التحقق ",
        later:"لاحقاً",

    },
    contact_us:{
        send:"ارسل رسالة",
        phone : 'رقم الهاتف',
        name : 'الإسم ',
        email : 'البريد الالكتروني',
        message : 'رسالة',
    }
};

export default ar;
