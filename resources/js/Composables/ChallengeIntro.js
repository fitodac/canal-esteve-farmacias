const spanishDate = date => {
	const _date = new Date(date)
	return _date.toLocaleDateString('es-ES')
}


const recommendationChallengeIntro = (challenge) => ({
    intructions: [
        {
            title: `Haz una foto`,
            content: `de cada ticket de venta o extrae el listado de ventas donde aparezcan los productos del reto.`,
        },
        {
            title: `Rellena el formulario y sube`,
            content: `una fotografía del ticket de compra o listado de ventas.`,
        },
        {
            title: `Consigue 1 punto`,
            content: `por cada unidad vendida.`,
        },
        {
            title: `Los puntos se irán acumulando`,
            content: `en tu cuenta y luego los podrás canjear por tarjetas regalo.`,
        },
        {
            title: ``,
            content: `Número máximo de puntos que se pueden conseguir con este reto: <strong>${challenge.score}</strong>.`,
        },
    ],

    considerations: [
        {
            title: `Promoción válida del ${spanishDate(
                challenge.date_from
            )} al ${spanishDate(challenge.date_to)}`,
            content: ``,
        },
        {
            title: `Número máximo de puntos`,
            content: `que se pueden conseguir con este reto: <strong>30</strong>`,
        },
        {
            title: `Productos promocionados:`,
            content: `${JSON.parse(challenge.participation)
                .map((e) => e.name)
                .join(", ")}`,
        },
        {
            title: ``,
            content: `Para más información consulta las <strong><a href="${challenge.legal}" target="_blank">Bases Legales.</a></strong>`,
        },
    ],
});




const visibilityChallengeIntro = (challenge) => ({
    intructions: [
        {
            title: `Dinámica del reto:`,
            content: `Realizar una foto con calidad suficiente para visualizar el material de comunicación expuesto en la farmacia, la exposición de mosquitos y subirlo a la web CANAL ESTEVE FARMACIAS para su revisión.`,
        },
    ],

    considerations: [
        {
            title: `Promoción válida del ${spanishDate(
                challenge.date_from
            )} al ${spanishDate(challenge.date_to)}`,
            content: ``,
        },
        {
            title: `Una misma foto podrá ser utilizada una única vez,`,
            content: `independientemente del usuario que reporte la
								imagen del material de comunicación expuesto.
								Cada miembro de CANAL ESTEVE FARMACIAS que
								trabaje en la farmacia en la que esta expuesto
								este material podrá subir una única foto de cada
								elemento descrito en la tabla anterior.`,
        },
        {
            title: `Únicamente se podrá participar una vez por usuario,`,
            content: `independentemente de si sube una o las dos fotos
								que dan derecho a la consecución del reto y por
								tanto a la obtención de los puntos ofertados.`,
        },
        {
            title: `Número máximo de puntos`,
            content: `que se pueden conseguir con este reto: <strong>${challenge.score}</strong>.`,
        },
        {
            title: ``,
            content: `Para más información consulta las <strong><a href="${challenge.legal}">Bases Legales.</a></strong>`,
        },
    ],
});



export {
	recommendationChallengeIntro,
	visibilityChallengeIntro
}
