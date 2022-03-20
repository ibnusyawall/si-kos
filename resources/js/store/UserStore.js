import axios from 'axios'

export default {
    strict: true,
    namespaced: true,
    mutations: {},
    actions: {
        users({ commit }) {
            return new Promise(async (resolve, reject) => {
                try {
                    let { data } = await axios('/api/v1/user')
                    resolve(data?.result)
                } catch (e) {
                    reject(e)
                }
            })
        },

        user({ commit }, id) {
            return new Promise(async (resolve, reject) => {
                try {
                    let { data } = await axios(`/api/v1/user/${id}`)
                    resolve(data?.result)
                } catch (e) {
                    reject(e)
                }
            })
        },
    },
}
