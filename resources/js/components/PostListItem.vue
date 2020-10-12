<template>
  <div class="mt-4 md:mt-0 md:ml-6">
    <router-link
      :to="{name: 'topic', params: {slug: topic.slug}}"
      class="uppercase tracking-wide text-xs text-indigo-600 font-bold hover:underline">
      <span>{{ topic.name }}</span>
    </router-link>
    <router-link :to="{name: 'post', params: {id: post.id}}">
      <h4 class="block mt-1 text-xl leading-tight font-semibold text-gray-900 hover:underline">{{ post.title }}</h4>
    </router-link>
    <p class="mt-2 text-gray-600">{{ post.lead }}</p>
    <p class="mt-2 text-xs text-gray-500">By <router-link :to="{name: 'author', params: {id: post.author.id}}" class="hover:underline">
      {{ post.author.name }}
    </router-link> - {{ post.created_at }}</p>
  </div>
</template>

<script>
export default {
  name: "PostListItem",
  props: {
    post: {
      type: Object,
      required: true
    },
    topic: {
      type: Object,
      required: true
    }
  }
}
</script>

<style scoped>

</style>
