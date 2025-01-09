<template>
  <ul>
    <li v-for="page in pages" :key="page.id">
      <div @click="toggle(page)">
        {{ page.title }}
      </div>
      <page-tree v-if="isVisible(page)" :pages="page.children" />
    </li>
  </ul>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    pages: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      visiblePages: [],
      pages: [] // Initialize empty array
    };
  },
  created() {
    this.fetchPages();
  },
  methods: {
    async fetchPages() {
      try {
        const response = await axios.get('/pages');
        this.pages = response.data;
      } catch (error) {
        console.error('Error fetching pages:', error);
      }
    },
    toggle(page) {
      const index = this.visiblePages.indexOf(page.id);
      if (index === -1) {
        this.visiblePages.push(page.id);
      } else {
        this.visiblePages.splice(index, 1);
      }
    },
    isVisible(page) {
      return this.visiblePages.includes(page.id);
    },
  },
};
</script>
