<template>
<div class="pt-3 pb-2">
  <div class="mb-2">
    <p class="text-sm text-grey-dark mb-1">
      {{comment.name}} - il y a {{diffForHumans}}
    </p>
      {{comment.body}}
  </div>
      <p class="flex">
        <button type="button" class="text-sm text-gray-400 font-semibold flex" @click="$emit('respond-to', comment)">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-grey-dark h-3 mr-1 flex-initial"><path d="M15 17v-2.99A4 4 0 0 0 11 10H8v5L2 9l6-6v5h3a6 6 0 0 1 6 6v3h-2z"/></svg>
          <p class="flex-initial">Repondre</p>
        </button>
      </p>
</div>
</template>

<script>
import {formatDistance, formatDistanceToNow} from 'date-fns';
import {fr} from "date-fns/esm/locale";
export default {

  props: ['comment', "now"],


  computed: {
    diffForHumans(){
      return formatDistance(new Date(this.comment.created_at), this.now, {locale: fr})
    }
  },

    methods:{
    format(date){
      return formatDistance(new Date(date), this.now, {locale: fr})
    }
  },
}
</script>
