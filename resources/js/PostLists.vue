<template>
  <div class="container mx-auto mt-20">
    <h2 class="font-bold text-4xl ml-6 mb-10">All Post</h2>
    <div v-if="$apollo.queries.posts.loading">
      <div v-for="item in 4" class="md:flex animate-pulse">
        <div class="mt-4 md:mt-0 md:ml-6 mb-12">
          <div class="w-16 h-4 bg-gray-400"></div>
          <div class="w-40 h-4 mt-1 bg-gray-400"></div>
          <div class="w-64 h-4 mt-2 bg-gray-400"></div>
        </div>
      </div>
    </div>
    <div v-else>
      <div v-for="post in posts" :key="post.id" class="md:flex mb-12">
        <PostListItem :post="post" :topic="post.topic"></PostListItem>
      </div>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";
import PostListItem from "./components/PostListItem";

export default {
  name: "PostList",
  components: {
    PostListItem
  },
  apollo: {
    posts: gql`
    {
      posts {
        id
        title
        lead
        created_at
        topic {
          name
          slug
        }
        author {
          id
          name
        }
      }
    }`
  }
}
</script>

<style scoped>

</style>
