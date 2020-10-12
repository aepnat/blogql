<template>
  <div class="container mx-auto mt-20">
    <h2 class="font-bold text-4xl ml-6 mb-10">
      <router-link :to="{name: 'index'}" class="text-gray-600 hover:underline">All Post</router-link>
      <span v-if="!$apollo.queries.topic.loading">
        <span class="text-gray-600">/</span>
        {{ topic.name }}
      </span>
    </h2>
    <div v-if="$apollo.queries.topic.loading">
      <div v-for="item in 4" class="md:flex animate-pulse">
        <div class="mt-4 md:mt-0 md:ml-6 mb-12">
          <div class="w-16 h-4 bg-gray-400"></div>
          <div class="w-40 h-4 mt-1 bg-gray-400"></div>
          <div class="w-64 h-4 mt-2 bg-gray-400"></div>
        </div>
      </div>
    </div>
    <div v-else>
      <div v-for="post in topic.posts" :key="post.id" class="md:flex mb-12">
        <PostListItem :post="post" :topic="topic"></PostListItem>
      </div>
    </div>
  </div>
</template>

<script>
import PostListItem from "./components/PostListItem";
import gql from "graphql-tag";

export default {
  name: "PostTopicList",
  components: {
    PostListItem
  },
  apollo: {
    topic: {
      query: gql`
        query TOPIC($slug: String!) {
          topic(slug: $slug) {
            name
            slug
            posts {
              id
              title
              lead
              created_at
              author {
                id
                name
              }
            }
          }
        }
      `,
      variables() {
        return {
          slug: this.$route.params.slug
        }
      }
    }
  }
}
</script>

<style scoped>

</style>
