import React from "react";

import Article from "./Article";

export default function Articles({ articles }) {
  return (
    <ul>
      {articles.map((article, i) => (
        <li key={i}>
          <Article title={article.title} content={article.content} />
        </li>
        // <Article {...article} key={i} />
      ))}
    </ul>
  );
}
