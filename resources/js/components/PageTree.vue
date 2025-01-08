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
export default {
  props: {
    pages: Array,
  },
  data() {
    return {
      visiblePages: [],
    };
  },
  methods: {
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
