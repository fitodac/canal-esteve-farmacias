<script setup>
import {reactive, onMounted, nextTick, ref} from 'vue'
import {useStore} from '@/store/mainStore.js'
import {storeToRefs} from 'pinia'
import {useModal} from "@/store/modalStore.js";

import {Link} from '@inertiajs/inertia-vue3'

import gsap from 'gsap'

import Logo from '@/Components/img/Logo.vue'
import Esteve from '@/Components/img/Esteve.vue'
import Corner from '@/Components/img/Corner.vue'

const modal = useModal();
const store = useStore();
const {user} = storeToRefs(store)

onMounted(() => {

    nextTick(() => {
        // added for the first load delay
        setTimeout(()=>{
            const button = document.querySelector('#btn-trigger')
            if (button) {
                const adminMenu = document.querySelector('#admin-menu')

                button.addEventListener('mouseover', () => {
                    adminMenu.style.display = 'block';
                });

                button.addEventListener('mouseout', () => {
                    adminMenu.style.display = 'none';
                });
            }
        }, 100)
    });
})

const menu_toggler_position = reactive({x: null, y: null})

// open session init / register modal
const handleOpenModal = (bypass, e) => {
    if (!user.value) {
        e.preventDefault();
        modal.open();
    }


    // retos sell-out
    if (bypass) {
        if (user.value && !user.value.pharmacy_id) {
            e.preventDefault();
            modal.open();
        }
    }
}
// OPEN MENU
const openMenu = () => {
    gsap.set('body', {overflow: 'hidden'})

    gsap.fromTo('.menu-toggler',
        {
            left: menu_toggler_position.x,
            top: menu_toggler_position.y,
            position: 'absolute',
        },
        {
            background: '#FFF',
            width: '200vh',
            height: '200vh',
            top: '-50vh',
            transform: 'translateX(-100vh)',
            zIndex: 49,
            duration: .5
        })

    gsap.set('.menu-toggler i', {opacity: 0})

    gsap.set('#mainNavbar', {
        left: 0,
        pointerEvents: 'initial',
        delay: .3
    })

    gsap.set('.menu-toggler', {
        display: 'none',
        delay: .3
    })

    gsap.from('#mainNavbar .main-navbar-header', {
        opacity: 0,
        delay: .4,
        duration: .3
    })

    gsap.from('#mainNavbar .main-navbar-wrapper', {
        opacity: 0,
        delay: .5,
        duration: .3
    })

    gsap.set('body', {
        overflow: 'auto',
        delay: .8
    })
}


// CLOSE MENU
const closeMenu = async () => {

    gsap.set('body', {overflow: 'hidden'})
    gsap.set('.menu-toggler', {display: 'block'})

    gsap.to('#mainNavbar .main-navbar-header', {
        opacity: 0,
        duration: .3
    })

    gsap.to('#mainNavbar .main-navbar-wrapper', {
        opacity: 0,
        delay: .2,
        duration: .3
    })

    gsap.set('#mainNavbar', {
        left: '-150vw',
        pointerEvents: 'none',
        delay: .3
    })

    gsap.to('.menu-toggler', {
        background: '#006983',
        width: '2.5rem',
        height: '2.5rem',
        left: menu_toggler_position.x,
        top: menu_toggler_position.y,
        transform: 'none',
        delay: .3,
        duration: .4
    })

    gsap.set('.menu-toggler i', {
        opacity: 1,
        delay: .7
    })

    gsap.set('#mainNavbar .main-navbar-header, #mainNavbar .main-navbar-wrapper', {
        opacity: 1,
        delay: 1
    })

    gsap.set('body', {
        overflow: 'auto',
        delay: 1
    })

}
const alertCode = ref('true')

const location = ref(window.location.href)
onMounted(() => {
    window.addEventListener('resize', () => document.getElementById('mainNavbar').removeAttribute('style'))

    menu_toggler_position.x = document.querySelector('.menu-toggler').getBoundingClientRect().x
    menu_toggler_position.y = document.querySelector('.menu-toggler').getBoundingClientRect().y

    window.addEventListener('popstate', () => {
        location.value = window.location.href
    })
})

</script>


<template>
    <header>
        <div v-if="$page.props.auth.user && !$page.props.auth.user.pharmacy_id && alertCode"
             class="bg-zinc-500 pl-3 text-white flow-root">
            <div class="py-2 float-left">
                <strong>Recuerda introducir tu código de invitación</strong> para desbloquear los retos y todo el
                contenido disponible.
                <Link
                    class="inline-flex items-center px-4 py-2 bg-white border font-bold border-primary rounded-full text-primary text-xs tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    :href="route('profile')">Ver más
                </Link>
            </div>
            <div class="float-right p-3">
                <button type="button" @click="alertCode = false">
                    <svg fill="#000000" width="30px" height="30px" viewBox="-2.4 -2.4 28.80 28.80"
                         xmlns="http://www.w3.org/2000/svg">

                        <g id="bgCarrier" stroke-width="0" transform="translate(5.16,5.16), scale(0.57)">

                            <rect x="-2.4" y="-2.4" width="28.80" height="28.80" rx="14.4" fill="#ffffff"
                                  strokewidth="0"/>

                        </g>

                        <g id="tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC"
                           stroke-width="0.048"/>

                        <g id="iconCarrier">

                            <path
                                d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"/>

                            <path
                                d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"/>

                        </g>

                    </svg>
                </button>
            </div>

        </div>
        <div class="top-bar">
            <Corner class="top-bar--corner"/>

            <div
                class="top-bar--menu"
                :class="{'top-bar--solid': user}">

                <div v-if="user && user.role === 'admin'" href="#"
                     class="top-bar--menu-item inline-block"
                     id="btn-trigger"
                >Menú de administración

                    <div class="relative hidden" id="admin-menu">
                        <!-- Dropdown menu, hidden on small screens -->
                        <div
                            class="hidden sm:block absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg bg-primary-100 border border-gray-200"
                            style="z-index:100"
                        >
                            <Link v-if="user && user.role === 'admin'" href="/admin/users"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Usuarios
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/resources"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Recursos
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/pharmacies"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Farmacias
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/challenges"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Retos
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/participation"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Participaciones
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/courses"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Formación
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/modules"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Módulos
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/questions"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Preguntas
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/giftcards"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Tarjetas de regalo
                            </Link>
                            <Link v-if="user && user.role === 'admin'" href="/admin/webinars"
                                  class="block px-4 py-2 text-gray-600 hover:bg-white">Webinarios
                            </Link>
                        </div>
                    </div>
                </div>

                <Link :href="route('contact')" class="top-bar--menu-item">Contacto</Link>
                <Link v-if="!user" :href="route('register')" class="top-bar--menu-item">Registro</Link>
                <Link v-if="!user" :href="route('login')" class="top-bar--menu-item">Iniciar sesión</Link>

                <Link v-if="user" :href="route('profile')" class="top-bar--menu-item">Mi Cuenta</Link>
            </div>
        </div>


        <div class="container mx-auto px-5 pt-6 md:px-0">

            <div class="flex justify-between items-center md:justify-center">
                <Link :href="route('home')">
                    <Logo class="fill-primary w-32 h-auto md:w-56"/>
                </Link>

                <button
                    @click="openMenu"
                    class="menu-toggler">
                    <i class="ri-menu-3-line"></i>
                </button>
            </div>

            <div id="mainNavbar">
                <div class="main-navbar-header">
                    <Esteve class="w-24 h-auto"/>

                    <button
                        @click="closeMenu"
                        class="menu-close">
                        <i class="ri-close-line"></i>
                    </button>
                </div>

                <div class="main-navbar-wrapper">
                    <Link :href="route('products')" class="navbar-link"
                          :class="{ 'active-link': location.indexOf('/productos') !== -1 }"
                    >Productos
                    </Link>
                    <a @click="handleOpenModal('',$event)" :href="route('courses.index')" class="navbar-link"
                       :class="{ 'active-link': location.indexOf('/formacion') !== -1 }"
                    >Formación</a>
                    <Link :href="route('webinar')" class="navbar-link">Webinars</Link>
                    <a @click="handleOpenModal('',$event)" :href="route('resources')" class="navbar-link"
                       :class="{ 'active-link': location.indexOf('/biblioteca-esteve') !== -1 }"
                    >Biblioteca ESTEVE</a>
                    <a @click="handleOpenModal(true,$event)" :href="route('sellout.index')" class="navbar-link"
                       :class="{ 'active-link': location.indexOf('/retos') !== -1 }"
                    >Retos sell-out</a>

                    <div class="grid pt-8 md:hidden">
                        <Link v-if="user && user.role === 'admin'" href="/admin/users" class="navbar-link">Usuarios
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/resources" class="navbar-link">
                            Recursos
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/pharmacies" class="navbar-link">
                            Farmacias
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/challenges" class="navbar-link">Retos
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/participation" class="navbar-link">
                            Participaciones
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/courses" class="navbar-link">Cursos
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/modules" class="navbar-link">Módulos
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/questions" class="navbar-link">
                            Preguntas
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/giftcards" class="navbar-link">Tarjetas
                            de regalo
                        </Link>
                        <Link v-if="user && user.role === 'admin'" href="/admin/webinars" class="navbar-link">
                            Webinarios
                        </Link>
                        <div v-if="user && user.role === 'admin'" class="my-1">&nbsp;</div>

                        <Link :href="route('contact')" class="navbar-link">Contacto</Link>
                        <Link v-if="!user" :href="route('register')" class="navbar-link">Registro</Link>
                        <Link v-if="!user" :href="route('login')" class="navbar-link">Iniciar sesión</Link>

                        <Link v-if="user" :href="route('profile')" class="navbar-link">Mi Cuenta</Link>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>


<style lang="scss" scoped>
.top-bar {
    @apply flex justify-end relative;

}

a.navbar-link.active-link {
    @apply border border-primary;
}

.top-bar--menu {
    @apply hidden items-start md:flex;

    .top-bar--menu-item {
        @apply text-sm font-medium leading-none tracking-tight whitespace-nowrap transition-all select-none;
    }


    &:not(.top-bar--solid) {
        .top-bar--menu-item {
            @apply bg-primary bg-opacity-10 px-4 pt-1 pb-2.5 rounded-b-xl;

            &:hover {
                @apply bg-primary text-white;
            }
        }

    }


    &.top-bar--solid {
        @apply bg-primary bg-opacity-10 px-3 py-1.5 rounded-bl-xl;

        .top-bar--menu-item {
            @apply px-4 pb-1;

            & + .top-bar--menu-item {
                @apply border-l border-gray-500;
            }
        }
    }

}


#mainNavbar {
    @apply bg-white fixed pointer-events-none;
    width: 100vw;
    height: 100vh;
    left: -150vw;
    top: 0;
    z-index: 50;

    @media (min-width: 657px) {
        // @apply bg-transparent w-auto h-auto inset-auto relative mt-8;

    }

    @media (min-width: 768px) {
        @apply bg-transparent w-auto h-auto inset-auto mt-8 relative opacity-100 pointer-events-auto;

        .main-navbar-header {
            @apply hidden;
        }

        .main-navbar-wrapper {
            @apply w-auto;
        }
    }
}

.main-navbar-header {
    @apply px-10 py-3 flex justify-between items-center;
}

.main-navbar-wrapper {
    @apply w-screen px-8 pt-4 pb-6 flex flex-col
    md:flex md:flex-row md:justify-center md:p-0;
}

.navbar-link {
    @apply border border-transparent font-medium leading-none
    tracking-tight px-4 pt-1.5 pb-2 rounded-full
    transition-all select-none
    md:mx-1;

    &:hover {
        @apply border-primary text-primary;
    }

    &:focus,
    &:active,
    &:active:focus {
        @apply bg-primary border-primary text-white;
    }
}

.navbar-link + .navbar-link {
    @apply mt-1.5 md:mt-0;
}


.menu-toggler {
    @apply bg-primary-500 text-white text-xl w-10 h-10 rounded-full md:hidden;
}

.menu-close {
    @apply text-primary-500 text-3xl w-8 h-8;
}
</style>
