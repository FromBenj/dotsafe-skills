<template>
  <div class="members">
    <Member name="test name"/>
  </div>
</template>

<script>

import Member from '@/components/Member.vue'
import axios from 'axios'


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
          .get('http://127.0.0.1:8000/api/members')
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
