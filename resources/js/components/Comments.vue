<template>
<div>
  <div class="border-b pb-4 mb-8">
    <comment
    v-for="comment in comments"
    :key="comment.id"
    :comment="comment"
    :now="now"
    @respond-to="respondTo=$event"
    />
  </div>
  <comment-form
  @newComment="comments.push($event)"
  :respond-to="respondTo"
  @cancel-respond-to="respondTo=null"
  />
</div>
</template>

<script>

import CommentForm from "./CommentForm.vue"
import Comment from "./Comment.vue"

export default {
  components: {CommentForm, Comment},
  data(){
    return {
    comments: [],
    respondTo: null,
    now: new Date(),
    }
  },
  mounted(){
    setInterval(()=>{
      this.now= new Date()
    }, 1000)


    axios.get('/comments/' + btoa(window.location.href))
          .then(({data})=> {
            this.comments = data
          })
  },
}
</script>
