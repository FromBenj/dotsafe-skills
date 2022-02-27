<template>
  <div class="members">
    <Member name="test name"/>
  </div>
</template>

<script>

import Member from '@/components/Member.vue'
import axios from 'axios'
import {apiRoot} from '@/API-config'



export default {
  name: 'Members',
  components: {
    Member
  },
  data() {
    return {
      dotsafeMembers: {}
    }
  },
  methods: {
    getMembers() {
      axios
          .get(apiRoot +'members')
          .then(response => (this.dotsafeMembers = response.data))
          .catch(error => console.log(error));
      console.log(this.dotsafeMembers)
    },
  },
  mounted() {
    this.getMembers();
  }
}
</script>
