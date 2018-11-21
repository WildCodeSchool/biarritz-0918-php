import React from "react";

export default function ArticleForm({ onSumbit }) {
  return (
    <form
      onSubmit={e => {
        e.preventDefault();
        const title = e.target.elements.title.value;
        const content = e.target.elements.content.value;
        debugger;
        onSumbit({ title, content });
      }}
    >
      Title: <input name="title" type="text" /> <br />
      Content: <input name="content" type="text" />
      <button type="submit">Create an article</button>
    </form>
  );
}
