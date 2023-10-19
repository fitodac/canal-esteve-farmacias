<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>


<template>
<div class="sidebar-profile">
	<Link
		:href="route('profile')"
		class="sidebar-profile--nav"
		:class="{'active': 'profile' === route().current()}">Escritorio</Link>

	<Link
		:href="route('my-account')"
		class="sidebar-profile--nav"
		:class="{'active': 'my-account' === route().current()}">Mis datos</Link>

	<Link
        v-if="$page.props.auth.user && $page.props.auth.user.role != 'titular'"
		:href="route('points-history')"
		class="sidebar-profile--nav"
		:class="{'active': 'points-history' === route().current()}">Histórico <br class="block lg:hidden"/>de puntos</Link>

	<Link
		:href="route('exit')"
		class="sidebar-profile--nav"
		:class="{'active': 'exit' === route().current()}">Salir</Link>

</div>
</template>

<style scoped>
.sidebar-profile{
	@apply border-b border-gray-200 flex md:border-r md:pt-4 md:grid;
}

.sidebar-profile--nav{
	@apply text-sm leading-none font-medium w-full
					px-2 py-3 flex transition-all select-none
					md:border-t md:border-gray-200
					hover:text-primary-500;
}

.sidebar-profile--nav:first-child{
	@apply border-none;
}

.sidebar-profile--nav.active{
	@apply text-primary-500;
}
</style>
