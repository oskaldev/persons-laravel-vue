import axios from "axios"
export const personModule = {
  state: () => ({
    person: null,
  }),
  getters: {
    getCurrentPerson: (state) => state.person
  },
  actions: {
    async getPerson({ commit }, id) {
      try {
        const response = await axios.get(`/api/persons/${id}`)
        commit('setPerson', response.data.data)
      } catch (error) {
        console.error(error)
      }
    },
  },
  mutations: {
    setPerson(state, person) {
      state.person = person
    }
  },
  namespaced: true
}