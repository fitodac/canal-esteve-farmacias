<script setup>
import Layout from '@/Layouts/LoginRegisterLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'
</script>


<template>
    <Layout>
        <div class="h-20 md:h-0"></div>

        <div class="text-center max-w-3xl mx-auto md:mt-10 lg:gap-y-14">
            <div class="grid gap-y-8">
                <div
                    class="text-primary-500 text-2xl font-bold leading-tight select-none md:text-4xl">
                    Tu correo electrónico ya está registrado <br class="hidden md:block">en Canal OTC o en ESTEVE ÁGORA.
                </div>

                <div class="text-xl leading-tight">
                    Por lo tanto puedes hacer <Link :href="route('login')">log-in</Link> en CANAL ESTEVE FARMACIAS
                    <span class="font-bold">con tu usario y contraseña existentes.</span> ¡Prueba ahora!.
                </div>

                <div
                    class="text-sm leading-tight md:text-base md:leading-tight">
                    Si no lo recibiste, ponte en
                    <Link :href="route('contact')" class="text-primary-500 font-semibold">Contacto</Link>
                    con nosotros.
                </div>
            </div>
        </div>
    </Layout>
</template>
