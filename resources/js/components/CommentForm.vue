<template>
  <form class="flex flex-col" @submit.prevent="submitComment">
    <textarea class="border rounded p-3" v-model="comment"></textarea>
    <button type="submit" class="border rounded py-3">Commenter</button>
  </form>

</template>

<script>
export default {
  data(){
    return {
    comment: '',
    }
  },
  methods:{
    submitComment(){
      axios.post('/comments', {
        content: this.comment
      })
    },
  },
}
</script>
