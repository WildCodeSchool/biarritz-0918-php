import React from "react";

export default function Article({ title, content }) {
  return (
    <article>
      <h3>{title}</h3>
      <p>{content}</p>
    </article>
  );
}
