<template>
<div>
  <div class="border rounded p-3 mb-4" v-for="comment in comments">
    <p class="text-sm text-grey-dark mb-2">
      {{comment.name}} - il y a {{format(comment.created_at)}}
    </p>
      {{comment.body}}
  </div>
  <comment-form @newComment="comments.push($event)"/>
</div>
</template>

<script>
import {formatDistance, formatDistanceToNow} from 'date-fns';
import {fr} from "date-fns/esm/locale";
import CommentForm from "./CommentForm.vue"

export default {
  components: {CommentForm},
  data(){
    return {
    comments: [],
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
  methods:{
    format(date){
      return formatDistance(new Date(date), this.now, {locale: fr})
    }
  },
}
</script>
