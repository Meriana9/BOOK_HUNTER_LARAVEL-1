<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ContactController extends Controller
{
    // Afficher la liste des contacts

    public function index()
    {
        $contacts = Auth::user()->contacts()->orderBy('created_at', 'DESC')->paginate(9);
        $categoriesWithContacts = Category::with('contacts')->get();
        return view('contacts.index', compact('contacts', 'categoriesWithContacts'));
    }


    // Afficher le formulaire de création de contact
    /* public function create()
    {
        return view('contacts.create');
    } */

    public function create()
{
    $categories = Category::all();
    return view('contacts.create', compact('categories'));
}


    // Afficher les détails d'un contact spécifique
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    // Afficher le formulaire de modification de contact
   /*  public function edit(Contact $contact)
    {
        #$this->authorize('update', $contact);
        if ($contact->user_id !== Auth::id()) {

            abort(403, 'Unauthorized action.');
        }
        return view('contacts.edit', compact('contact'));
    } */
    public function edit(Contact $contact)
{
    $categories = Category::all();
    $contactCategories = $contact->categories->pluck('id')->toArray();
    return view('contacts.edit', compact('contact', 'categories', 'contactCategories'));
}

    // Stocker un nouveau contact
   /*  public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:contacts',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'notes' => 'nullable|string',
            'profile_image' => 'nullable|string|max:255',
            'last_contacted_at' => 'nullable|date',
        ]);

        // Créer une nouvelle instance de contact
        $contact = new Contact();
        $contact->first_name = $validatedData['first_name'];
        $contact->last_name = $validatedData['last_name'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->address = $validatedData['address'];
        $contact->date_of_birth = $validatedData['date_of_birth'];
        $contact->notes = $validatedData['notes'];
        $contact->profile_image = $validatedData['profile_image'];
        $contact->last_contacted_at = $validatedData['last_contacted_at'];

        // Liaison du contact à l'utilisateur actuellement authentifié
        $contact->user_id = Auth::id();

        // Enregistrer le contact dans la base de données
        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Contact ajouté avec succès!');
    } */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'nullable|email|unique:contacts',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'company' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'notes' => 'nullable|string',
        'profile_image' => 'nullable|string|max:255',
        'last_contacted_at' => 'nullable|date',
        'categories' => 'array',
        'categories.*' => 'exists:categories,id',
    ]);

    // Créer une nouvelle instance de contact
    $contact = new Contact();
    $contact->first_name = $validatedData['first_name'];
    $contact->last_name = $validatedData['last_name'];
    $contact->email = $validatedData['email'];
    $contact->phone = $validatedData['phone'];
    $contact->address = $validatedData['address'];
    $contact->company = $validatedData['company'];
    $contact->date_of_birth = $validatedData['date_of_birth'];
    $contact->notes = $validatedData['notes'];
    $contact->profile_image = $validatedData['profile_image'];
    $contact->last_contacted_at = $validatedData['last_contacted_at'];

    // Liaison du contact à l'utilisateur actuellement authentifié
    $contact->user_id = Auth::id();

    // Enregistrer le contact dans la base de données
    $contact->save();

    // Associer les catégories au contact
    if ($request->has('categories')) {
        $contact->categories()->sync($request->categories);
    }

    return redirect()->route('contacts.index')->with('success', 'Contact ajouté avec succès!');
}



public function update(Request $request, Contact $contact)
{
    $validatedData = $request->validate([
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'date_of_birth' => 'required|date',
        'categories' => 'array',
        'categories.*' => 'exists:categories,id',
    ]);

    $contact->update($validatedData);
    if ($request->has('categories')) {
        $contact->categories()->sync($request->categories);
    }

    return redirect()->route('contacts.index')->with('success', 'Contact modifié avec succès!');
}


    // Supprimer un contact
    public function destroy(Contact $contact)
    {

        if ($contact->user_id !== Auth::id()) {
          abort(403, 'Unauthorized action.');
      }else{

          $contact->delete();
      }

      return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succès!');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $contacts = Contact::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('phone', 'LIKE', '%' . $searchTerm . '%')
            ->paginate(10);

        return view('contacts.search', compact('contacts', 'searchTerm'));
    }

    public function favorite(Contact $contact)
    {
        $user = Auth::user();
        if (!$user->favorites->contains($contact->id)) {
            $user->favorites()->attach([$contact->id]);
            return redirect()->back()->with('success', 'Contact ajouté aux favoris.');
        }
        return redirect()->back()->with('info', 'Ce contact est déjà dans vos favoris.');
    }

    public function unfavorite(Contact $contact)
    {
        Auth::user()->favorites()->detach($contact->id);
        return redirect()->back()->with('success', 'Contact retiré des favoris.');
    }
    public function filterByCategory(Category $category)
{
    $contacts = $category->contacts()->paginate(9);
    return view('contacts.index', compact('contacts'));
}

}



    // Mettre à jour un contact existant
  /*   public function update(Request $request, Contact $contact)
    {
        #$this->authorize('update', $contact);
        if ($contact->user_id !== Auth::id()) {

            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'notes' => 'nullable|string',
            'profile_image' => 'nullable|string|max:255',
            'last_contacted_at' => 'nullable|date',
        ]);

        $contact->update($validatedData);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    } */
