<template>
    <form class="flex flex-col" @submit.prevent="submitComment">
      <div class="mb-3">
        <h3 class="font-normal text-grey-darkest text-sm">Nouveau Commentaire :</h3>
        <p v-if="respondTo" class="text-grey-darkest text-xs">
          En Réponse à <span class="font-semibold">{{respondTo.name}}</span> : "{{respondTo.body}}"
          <button type="button" @click="$emit('cancel-respond-to')">Annuler</button>
        </p>
      </div>
      <div class="mb-3">
        <input type="text" class="border rounded p-3 w-full" :class="{'border-red-500' : errors.name}" v-model="form.name" placeholder="Pseudo">
        <p class="text-red-500 text-xs italic px-3 py-1" v-if="errors.name" v-text="errors.name[0]"></p>
      </div>
      <div class="mb-3">
        <textarea class="border rounded p-3 w-full" v-model="form.body" :class="{'border-red-500' : errors.body}" placeholder="Commentaire"></textarea>
        <p class="text-red-500 text-xs italic px-3 py-1" v-if="errors.body" v-text="errors.body[0]"></p>
      </div>
    <button type="submit" class="border rounded py-3">Commenter</button>
  </form>
</template>

<script>
export default {
  props:['respondTo'],

    data(){
    return {
      form: {
        name: '',
        body: '',
        url: window.location.href,
      },
    errors: '',
    }
  },
  methods: {
    submitComment(){
      axios.post('/comments', this.form)
      .then(({data}) => {
        this.$emit('newComment', {data})
        this.form.body = ""
        this.errors = {}
      })
      .catch(error => {
        this.errors = error.response.data.errors
      })
    },
  }
}
</script>
