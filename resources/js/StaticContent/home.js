const section1 = {
    title: "CANAL ESTEVE FARMACIAS",
    intro: `En Esteve somos lo que somos gracias a la dedicación
						de colaboradores como tú y a la confianza de clientes
						y pacientes. Y la mejor forma de agradecértelo es
						ofreciéndote el conocimiento y las herramientas que
						te ayuden a crecer.`,
    list: [
        {
            img: "/img/circle-1.svg",
            description:
                "<strong>Información de nuestros productos</strong> <br>Todo lo que necesitas saber sobre nuestras marcas.",
            btn: {
                link: "productos",
                text: "Descubrir",
            },
        },
        {
            img: "/img/circle-2.svg",
            description:
                "<strong>Formación online</strong> <br>Contenidos para ofrecer un mejor consejo farmacéutico a tus clientes.",
            btn: {
                link: "formacion",
                text: "Aprender",
            },
        },
        {
            img: "/img/circle-3.svg",
            description:
                "<strong>Biblioteca ESTEVE</strong> <br>Materiales, imágenes y recursos de los productos de ESTEVE.",
            btn: {
                link: "biblioteca-esteve",
                text: "Crecer",
            },
        },
        {
            img: "/img/circle-4.svg",
            description:
                "<strong>Retos sell-out</strong> <br>Consigue puntos y mucho más.",
            btn: {
                link: "retos",
                text: "Ganar",
            },
        },
    ],
};





const section2 = {
    title: 'Nuestras marcas',
    list: [
        {
            logo: '/img/logo-dormidina.webp',
            name: 'Dormidina',
            slogan: 'Más de 30 años cuidando los sueños*',
            note: '* Cuidando del sueño que te cuida.',
            tab: 'Dormi',
            btn: {
                link: '/productos',
                text: 'Descubrir'
            }
        },
        {
            logo: '/img/logo-aquoral.webp',
            name: 'Aquoral',
            slogan: 'Alivio rápido y duradero para los ojos secos*',
            note: '* Instrucciones de uso Aquoral.',
            tab: 'Aquoral',
            btn: {
                link: '/productos',
                text: 'Descubrir'
            }
        },
        {
            logo: '/img/logo-tripto-max.webp',
            name: 'Triptomax',
            slogan: 'Complementos alimenticios para el bienestar emocional',
            note: '',
            tab: 'Triptomax',
            btn: {
                link: '/productos',
                text: 'Descubrir'
            }
        },
        {
            logo: '/img/logo-natcolest.webp',
            name: 'NatColest',
            slogan: 'Combinación única de 4 extractos vegetales que ayudan a mantener, de forma natural, los niveles normales de colesterol.<sup>*</sup>',
            note: '* Colantonio LD, Bittner V, Reynolds K et al. Association of Serum Lipids and Coronary Heart Disease in Contemporary Observational Studies. Circulation. 2016;133(3):256–64.',
            tab: 'NatColest',
            btn: {
                link: '/productos',
                text: 'Descubrir'
            }
        },
        {
            logo: '/img/logo-afterbite.webp',
            name: 'AfterBite & RepelBite',
            slogan: 'Soluciones para el alivio y la protección de picaduras',
            note: '',
            tab: 'Mosquitos',
            btn: {
                link: '/productos',
                text: 'Descubrir'
            }
        },
        {
            logo: '/img/logo-calmiox.webp',
            name: 'Calmiox',
            slogan: 'Medicamento de uso cutáneo con hidrocortisona, para aliviar el picor de la piel',
            note: '',
            tab: 'Piel',
            btn: {
                link: '/productos',
                text: 'Descubrir'
            }
        },
    ]
}



const section3 = {
    title: "Contenidos que te pueden interesar",
    list: [
        {
            img: "/img/dormidina-400x400px.webp",
            title: "¿Tus clientes llegan a tu farmacia hartos de contar ovejas por la noche? ¡Fórmate con nuestro curso sobre “sueño y descanso”",
            subtitle:"Formación",
            link: "/curso/2",
            color: "blue",
            subnote: "",
        },
        {
            img: "/img/aquoral-2-400x400px.webp",
            title: "¿Tus clientes llegan a tu farmacia quejándose de ojos secos? ¡Fórmate con nuestro curso sobre el “ojo seco”",
            subtitle:"Formación",
            link: "/curso/6",
            color: "sky",
            subnote: "",
        },
        {
            img: "/img/aquoral-400x400px.webp",
            title: "Cómo dar respuesta a las principales consultas oftalmológicas desde la oficina de farmacia ",
            subtitle:"Webinar",
            link: "/curso/7",
            color: "sky",
            subnote: "",
        },
        // {
        //     img: "/img/img-post-4.webp",
        //     title: "¡NUEVO! Repelbite Natural Loción",
        //     link: "/productos/repelbite/repelbite-natural-locion",
        //     color: "magenta",
        // },
        {
            img: "/img/img-post-5.webp",
            title: "¡NUEVO! NatColest® Ayuda a mantener los niveles normales de colesterol de forma natural<sup>*</sup>.",
            subtitle:"Producto",
            link: "/productos/natcolest/natcolest",
            color: "green-dark",
            subnote: "* Colantonio LD, Bittner V, Reynolds K et al. Association of Serum Lipids and Coronary Heart Disease in Contemporary Observational Studies. Circulation. 2016;133(3):256–64.",
        },
    ],
};



export {
    section1,
    section2,
    section3
}
