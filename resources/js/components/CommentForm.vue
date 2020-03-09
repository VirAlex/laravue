<template>
<div>
  <div class="border rounded p-3 mb-4" v-for="comment in comments">
    <p class="text-sm text-grey-dark mb-2">
      {{comment.name}} - {{comment.created_at}}
    </p>
      {{comment.body}}
  </div>
  <form class="flex flex-col" @submit.prevent="submitComment">
    <h3 class="font-normal text-grey-darkest text-sm mb-3">Nouveau Commentaire :</h3>
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
</div>
</template>

<script>
export default {
  data(){
    return {
      form: {
        name: '',
        body: '',
        url: window.location.href,
      },
    comments: [],
    errors: '',
    }
  },
  mounted(){
    axios.get('/comments/' + btoa(window.location.href))
          .then(({data})=> {
            this.comments = data
          })
  },
  methods:{
    submitComment(){
      axios.post('/comments', this.form)
      .then(({data}) => {
        this.comments.push(data)
        this.form.body = ""
        this.errors = {}
      })
      .catch(error => {
        this.errors = error.response.data.errors
      })
    },
  },
}
</script>
