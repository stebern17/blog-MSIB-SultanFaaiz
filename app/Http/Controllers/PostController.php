<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $profiles = Profile::all();
        return view('posts.create', compact('categories', 'profiles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id'   => 'required|exists:categories,id',
            'author_id'     => 'required|exists:profiles,id',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }

            // Determine if is_published should be true or false
            $isPublished = $request->has('is_published') ? true : false;

            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'is_published' => $isPublished,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id
            ]);

            return redirect()->route('posts.index')->with('success', 'Post created successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }




    public function edit(Post $post)
    {
        $categories = Category::all();
        $profiles = Profile::all(); // Pass profiles for editing
        return view('posts.edit', compact('post', 'categories', 'profiles'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id'   => 'required|exists:categories,id',
            'author_id'     => 'required|exists:profiles,id',
        ]);

        try {
            $imagePath = $post->image; // Store old image path
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }

            // Determine if is_published should be true or false
            $isPublished = $request->has('is_published') ? true : false;

            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'is_published' => $isPublished,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id
            ]);

            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }



    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
