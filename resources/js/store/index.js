import { createStore } from "vuex"
import { personModule } from "./modules/person"

export default createStore({
  modules: {
    person: personModule
  }
})