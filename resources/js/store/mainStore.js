import { defineStore } from 'pinia'

export const useStore = defineStore("main", {
	state: () => ({
		user: null,
		// token: null
	}),

	getters: {
		getName(state){ return state.user?.usu_nombre }
	},

	actions: {
		setUser(val) {
			this.user = val;
		},
        deleteUser() {
            this.user = null
        }
	},
});
